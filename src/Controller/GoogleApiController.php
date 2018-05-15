<?php

namespace App\Controller;

use App\Services\getUserFromToken;
use App\Entity\Users;
use Google_Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GoogleApiController extends Controller
{
    /**
     * @param getUserFromToken $getUserFromToken
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(Request $request, getUserFromToken $getUserFromToken)
    {
        $session = $request->getSession();
        //$session = new Session();
        $session->start();

        $client = new Google_Client();
        try {
            $client->setAuthConfig('../config/client_secrets.json');
        } catch (\Google_Exception $e) {
            $client = null;
        }
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/login');
        $client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

        $request = Request::createFromGlobals();
        $code = $request->query->get('code');
        if (!isset($code)) {
            return $this->redirect($client->createAuthUrl());
        } else {
            $client->authenticate($code);
            $token = $client->getAccessToken();
            $authCheck = $getUserFromToken->getUser($token["id_token"], $client);
            if ($authCheck) {
                $user = $this->getDoctrine()->getRepository(Users::class)->findOneBy(["userTokenId" => $authCheck['sub']]);
                if (!$user) {
                    $this->save($authCheck['name'], $authCheck['email'], $authCheck['sub']);
                    $user = $this->getDoctrine()->getRepository(Users::class)->findOneBy(["userTokenId" => $authCheck['sub']]);
                }
                $session->set('accessToken', $client->getAccessToken());
                $session->set('id', $user->getId());
            }
            return $this->redirectToRoute('index');
        }
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logout(Request $request)
    {
        $session = $request->getSession();
        //$session = new Session();
        $session->start();
        $session->invalidate();

        return $this->redirectToRoute('index');
    }

    /**
     * @param $name
     * @param $email
     * @param $token
     */
    public function save($name, $email, $token)
    {
        $entityManager = $this->getDoctrine()->getManager();
        //Insert data to Users table
        $user = new Users();
        $user->setUserName($name);
        $user->setUserEmail($email);
        $user->setUserTokenId($token);
        //Save
        $entityManager->persist($user);
        $entityManager->flush();
    }
}
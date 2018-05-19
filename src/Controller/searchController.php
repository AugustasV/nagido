<?php
/**
 * Created by PhpStorm.
 * User: dangis
 * Date: 18.5.12
 * Time: 14.24
 */

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Documents;

class searchController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $session = $request->getSession();
        $id = $session->get("id");

        $input = $request->request->get('search');
        $userFiles = $this->getReminderDates($input, $id);

        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('home/home.html.twig', [
            'files' => $userFiles,
            'categories' => $categories,
            'form' => Null
        ]);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function getReminderDates($input, $id)
    {

        $em = $this->getDoctrine()->getManager()->getRepository(Documents::class);
        $qb = $em->createQueryBuilder("document");
        $qb
            ->andWhere('document.docName LIKE :id')
            ->andWhere('document.userId = :user')
            ->setParameter('id', "%".$input."%")
            ->setParameter('user', $id)
        ;
        $result = $qb->getQuery()->getResult();
        return $result;
    }
}
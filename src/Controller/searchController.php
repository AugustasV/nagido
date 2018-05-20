<?php
/**
 * Created by PhpStorm.
 * User: dangis
 * Date: 18.5.12
 * Time: 14.24
 */

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Document;
use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $userFiles = $this->getDoctrine()->getManager()->getRepository(Document::class)->search($input, $id);
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $tag = $this->getDoctrine()->getRepository(Tag::class)->findAll();

        return $this->render('home/home.html.twig', [
            'files' => $userFiles,
            'categories' => $categories,
            'form' => Null,
            'tags' => $tag
        ]);
    }
}
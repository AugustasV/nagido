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
        $input = $request->request->get('search');

        return $this->render('home/home.html.twig', [
            'files' => $this->getDoctrine()->getManager()->getRepository(Document::class)->search($input, $this->getUser()),
            'categories' => $this->getDoctrine()->getRepository(Category::class)->findAll(),
            'form' => null,
            'tags' => null
        ]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18.4.21
 * Time: 09.46
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InsideController extends HomeController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
            return $this->render('inside/index.html.twig', [
                'second_controller_name' => 'InsideController',
            ]);
    }
}

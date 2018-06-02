<?php
/**
 * Created by PhpStorm.
 * User: dangis
 * Date: 18.6.2
 * Time: 14.02
 */

namespace App\Controller;


use App\Entity\Document;
use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DocumentController extends Controller
{
    /**
     * @param Request $request
     * @param DataService $dataService
     * @return JsonResponse
     */
    public function index(Request $request, DataService $dataService)
    {
        $input = $request->request->get('category');

        //$documents = $this->getDoctrine()->getManager()->getRepository(Document::class)->findAll();
        $documents = $this->getUser()->getDocuments();
        return $dataService->processData($documents);
    }
}
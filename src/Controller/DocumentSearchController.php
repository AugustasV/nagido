<?php

namespace App\Controller;

use App\Entity\Document;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DocumentSearchController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $input = $request->request->get('id');

        $document = $this->getDoctrine()->getManager()->getRepository(Document::class)->search($input, $this->getUser());

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setIgnoredAttributes(['user', 'files']);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $serializer = new Serializer(array($normalizer), array(new JsonEncoder()));
        $jsonContent = $serializer->serialize($document, 'json');

        return new JsonResponse(array('data' => $jsonContent));
    }
}
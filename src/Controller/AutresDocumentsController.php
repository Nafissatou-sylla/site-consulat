<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutresDocumentsController extends AbstractController
{
    #[Route('/autres/documents', name: 'app_autres_documents')]
    public function index(): Response
    {
        return $this->render('autres_documents/index.html.twig', [
            'controller_name' => 'AutresDocumentsController',
        ]);
    }
}

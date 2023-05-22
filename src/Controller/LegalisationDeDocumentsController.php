<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalisationDeDocumentsController extends AbstractController
{
    #[Route('/legalisation/de/documents', name: 'app_legalisation_de_documents')]
    public function index(): Response
    {
        return $this->render('legalisation_de_documents/index.html.twig', [
            'controller_name' => 'LegalisationDeDocumentsController',
        ]);
    }
}

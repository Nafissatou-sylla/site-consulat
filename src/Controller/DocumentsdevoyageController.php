<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DocumentsdevoyageController extends AbstractController
{
    #[Route('/documentsdevoyage', name: 'app_documentsdevoyage')]
    public function index(): Response
    {
        return $this->render('documentsdevoyage/index.html.twig', [
            'controller_name' => 'DocumentsdevoyageController',
        ]);
    }
}

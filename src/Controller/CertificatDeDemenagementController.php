<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CertificatDeDemenagementController extends AbstractController
{
    #[Route('/certificat/de/demenagement', name: 'app_certificat_de_demenagement')]
    public function index(): Response
    {
        return $this->render('certificat_de_demenagement/index.html.twig', [
            'controller_name' => 'CertificatDeDemenagementController',
        ]);
    }
}

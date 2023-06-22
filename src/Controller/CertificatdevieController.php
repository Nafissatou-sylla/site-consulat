<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CertificatdevieController extends AbstractController
{
    #[Route('/certificatdevie', name: 'app_certificatdevie')]
    public function index(): Response
    {
        return $this->render('certificatdevie/index.html.twig', [
            'controller_name' => 'CertificatdevieController',
        ]);
    }
}

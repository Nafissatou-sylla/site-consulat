<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CertificatdepacsController extends AbstractController
{
    #[Route('/certificatdepacs', name: 'app_certificatdepacs')]
    public function index(): Response
    {
        return $this->render('certificatdepacs/index.html.twig', [
            'controller_name' => 'CertificatdepacsController',
        ]);
    }
}

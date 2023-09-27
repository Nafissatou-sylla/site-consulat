<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CertificatDeCoutumeController extends AbstractController
{
    #[Route('/certificatdecoutume', name: 'app_certificat_de_coutume')]
    public function index(): Response
    {
        return $this->render('certificat_de_coutume/index.html.twig', [
            'controller_name' => 'CertificatDeCoutumeController',
        ]);
    }
}

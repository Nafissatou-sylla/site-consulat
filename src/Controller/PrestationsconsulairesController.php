<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationsconsulairesController extends AbstractController
{
    #[Route('/prestationsconsulaires', name: 'app_prestationsconsulaires')]
    public function index(): Response
    {
        return $this->render('prestationsconsulaires/index.html.twig', [
            'controller_name' => 'PrestationsconsulairesController',
        ]);
    }
}

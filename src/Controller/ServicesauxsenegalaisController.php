<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesauxsenegalaisController extends AbstractController
{
    #[Route('/servicesauxsenegalais', name: 'app_servicesauxsenegalais')]
    public function index(): Response
    {
        return $this->render('servicesauxsenegalais/index.html.twig', [
            'controller_name' => 'ServicesauxsenegalaisController',
        ]);
    }
}

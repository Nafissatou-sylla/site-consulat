<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LaissezpassermortuaireController extends AbstractController
{
    #[Route('/laissezpassermortuaire', name: 'app_laissezpassermortuaire')]
    public function index(): Response
    {
        return $this->render('laissezpassermortuaire/index.html.twig', [
            'controller_name' => 'LaissezpassermortuaireController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotdaccueilController extends AbstractController
{
    #[Route('/motdaccueil', name: 'app_motdaccueil')]
    public function index(): Response
    {
        return $this->render('motdaccueil/index.html.twig', [
            'controller_name' => 'MotdaccueilController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatcivilController extends AbstractController
{
    #[Route('/etatcivil', name: 'app_etatcivil')]
    public function index(): Response
    {
        return $this->render('etatcivil/index.html.twig', [
            'controller_name' => 'EtatcivilController',
        ]);
    }
}

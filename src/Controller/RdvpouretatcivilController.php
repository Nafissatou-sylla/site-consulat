<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvpouretatcivilController extends AbstractController
{
    #[Route('/rdvpouretatcivil', name: 'app_rdvpouretatcivil')]
    public function index(): Response
    {
        return $this->render('rdvpouretatcivil/index.html.twig', [
            'controller_name' => 'RdvpouretatcivilController',
        ]);
    }
}

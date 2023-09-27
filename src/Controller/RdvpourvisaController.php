<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvpourvisaController extends AbstractController
{
    #[Route('/rdvpourvisa', name: 'app_rdvpourvisa')]
    public function index(): Response
    {
        return $this->render('rdvpourvisa/index.html.twig', [
            'controller_name' => 'RdvpourvisaController',
        ]);
    }
}

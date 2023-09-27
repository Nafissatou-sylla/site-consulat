<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PayseuropeensController extends AbstractController
{
    #[Route('/payseuropeens', name: 'app_payseuropeens')]
    public function index(): Response
    {
        return $this->render('payseuropeens/index.html.twig', [
            'controller_name' => 'PayseuropeensController',
        ]);
    }
}

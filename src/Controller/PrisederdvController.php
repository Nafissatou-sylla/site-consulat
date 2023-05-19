<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrisederdvController extends AbstractController
{
    #[Route('/prisederdv', name: 'app_prisederdv')]
    public function index(): Response
    {
        return $this->render('prisederdv/index.html.twig', [
            'controller_name' => 'PrisederdvController',
        ]);
    }
}

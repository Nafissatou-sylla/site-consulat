<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaysafricainsController extends AbstractController
{
    #[Route('/paysafricains', name: 'app_paysafricains')]
    public function index(): Response
    {
        return $this->render('paysafricains/index.html.twig', [
            'controller_name' => 'PaysafricainsController',
        ]);
    }
}

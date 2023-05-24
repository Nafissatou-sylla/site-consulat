<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutreservicesController extends AbstractController
{
    #[Route('/autreservices', name: 'app_autreservices')]
    public function index(): Response
    {
        return $this->render('autreservices/index.html.twig', [
            'controller_name' => 'AutreservicesController',
        ]);
    }
}

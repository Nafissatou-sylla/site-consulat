<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandedevisaController extends AbstractController
{
    #[Route('/demandedevisa', name: 'app_demandedevisa')]
    public function index(): Response
    {
        return $this->render('demandedevisa/index.html.twig', [
            'controller_name' => 'DemandedevisaController',
        ]);
    }
}

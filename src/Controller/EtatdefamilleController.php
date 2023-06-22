<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatdefamilleController extends AbstractController
{
    #[Route('/etatdefamille', name: 'app_etatdefamille')]
    public function index(): Response
    {
        return $this->render('etatdefamille/index.html.twig', [
            'controller_name' => 'EtatdefamilleController',
        ]);
    }
}

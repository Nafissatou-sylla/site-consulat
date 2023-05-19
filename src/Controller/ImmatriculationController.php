<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImmatriculationController extends AbstractController
{
    #[Route('/immatriculation', name: 'app_immatriculation')]
    public function index(): Response
    {
        return $this->render('immatriculation/index.html.twig', [
            'controller_name' => 'ImmatriculationController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteconsulaireController extends AbstractController
{
    #[Route('/carteconsulaire', name: 'app_carteconsulaire')]
    public function index(): Response
    {
        return $this->render('carteconsulaire/index.html.twig', [
            'controller_name' => 'CarteconsulaireController',
        ]);
    }
}

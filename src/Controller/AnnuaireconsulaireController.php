<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnuaireconsulaireController extends AbstractController
{
    #[Route('/annuaireconsulaire', name: 'app_annuaireconsulaire')]
    public function index(): Response
    {
        return $this->render('annuaireconsulaire/index.html.twig', [
            'controller_name' => 'AnnuaireconsulaireController',
        ]);
    }
}

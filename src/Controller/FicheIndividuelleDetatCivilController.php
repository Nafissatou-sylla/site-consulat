<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FicheIndividuelleDetatCivilController extends AbstractController
{
    #[Route('/fiche/individuelle/detat/civil', name: 'app_fiche_individuelle_detat_civil')]
    public function index(): Response
    {
        return $this->render('fiche_individuelle_detat_civil/index.html.twig', [
            'controller_name' => 'FicheIndividuelleDetatCivilController',
        ]);
    }
}

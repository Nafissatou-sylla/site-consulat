<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EffectuerunedemandevisaController extends AbstractController
{
    #[Route('/effectuerunedemandevisa', name: 'app_effectuerunedemandevisa')]
    public function index(): Response
    {
        return $this->render('effectuerunedemandevisa/index.html.twig', [
            'controller_name' => 'EffectuerunedemandevisaController',
        ]);
    }
}

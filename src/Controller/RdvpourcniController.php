<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvpourcniController extends AbstractController
{
    #[Route('/rdvpourcni', name: 'app_rdvpourcni')]
    public function index(): Response
    {
        return $this->render('rdvpourcni/index.html.twig', [
            'controller_name' => 'RdvpourcniController',
        ]);
    }
}

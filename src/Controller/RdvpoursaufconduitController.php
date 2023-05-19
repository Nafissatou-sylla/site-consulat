<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvpoursaufconduitController extends AbstractController
{
    #[Route('/rdvpoursaufconduit', name: 'app_rdvpoursaufconduit')]
    public function index(): Response
    {
        return $this->render('rdvpoursaufconduit/index.html.twig', [
            'controller_name' => 'RdvpoursaufconduitController',
        ]);
    }
}

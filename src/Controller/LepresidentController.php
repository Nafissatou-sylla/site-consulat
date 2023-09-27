<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LepresidentController extends AbstractController
{
    #[Route('/lepresident', name: 'app_lepresident')]
    public function index(): Response
    {
        return $this->render('lepresident/index.html.twig', [
            'controller_name' => 'LepresidentController',
        ]);
    }
}

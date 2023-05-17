<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaufConduitController extends AbstractController
{
    #[Route('/sauf/conduit', name: 'app_sauf_conduit')]
    public function index(): Response
    {
        return $this->render('sauf_conduit/index.html.twig', [
            'controller_name' => 'SaufConduitController',
        ]);
    }
}

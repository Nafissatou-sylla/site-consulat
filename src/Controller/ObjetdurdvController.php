<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetdurdvController extends AbstractController
{
    #[Route('/objetdurdv', name: 'app_objetdurdv')]
    public function index(): Response
    {
        return $this->render('objetdurdv/index.html.twig', [
            'controller_name' => 'ObjetdurdvController',
        ]);
    }
}

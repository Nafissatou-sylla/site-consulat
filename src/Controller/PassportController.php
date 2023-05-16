<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PassportController extends AbstractController
{
    #[Route('/passport', name: 'app_passport')]
    public function index(): Response
    {
        return $this->render('passport/index.html.twig', [
            'controller_name' => 'PassportController',
        ]);
    }
}

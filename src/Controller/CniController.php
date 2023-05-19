<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CniController extends AbstractController
{
    #[Route('/cni', name: 'app_cni')]
    public function index(): Response
    {
        return $this->render('cni/index.html.twig', [
            'controller_name' => 'CniController',
        ]);
    }
}

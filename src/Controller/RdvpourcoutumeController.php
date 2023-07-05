<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvpourcoutumeController extends AbstractController
{
    #[Route('/rdvpourcoutume', name: 'app_rdvpourcoutume')]
    public function index(): Response
    {
        return $this->render('rdvpourcoutume/index.html.twig', [
            'controller_name' => 'RdvpourcoutumeController',
        ]);
    }
}

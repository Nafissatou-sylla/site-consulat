<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvpourtranscriptionController extends AbstractController
{
    #[Route('/rdvpourtranscription', name: 'app_rdvpourtranscription')]
    public function index(): Response
    {
        return $this->render('rdvpourtranscription/index.html.twig', [
            'controller_name' => 'RdvpourtranscriptionController',
        ]);
    }
}

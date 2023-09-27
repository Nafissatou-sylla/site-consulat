<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RenouvellementpasseportController extends AbstractController
{
    #[Route('/renouvellementpasseport', name: 'app_renouvellementpasseport')]
    public function index(): Response
    {
        return $this->render('renouvellementpasseport/index.html.twig', [
            'controller_name' => 'RenouvellementpasseportController',
        ]);
    }
}

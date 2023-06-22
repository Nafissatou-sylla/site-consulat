<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcordanceController extends AbstractController
{
    #[Route('/concordance', name: 'app_concordance')]
    public function index(): Response
    {
        return $this->render('concordance/index.html.twig', [
            'controller_name' => 'ConcordanceController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageErreurController extends AbstractController
{
    #[Route('/page/erreur', name: 'app_page_erreur')]
    public function index(): Response
    {
        return $this->render('page_erreur/index.html.twig', [
            'controller_name' => 'PageErreurController',
        ]);
    }
}

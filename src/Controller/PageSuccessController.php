<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageSuccessController extends AbstractController
{
    #[Route('/page/success', name: 'app_page_success')]
    public function index(): Response
    {
        return $this->render('page_success/index.html.twig', [
            'controller_name' => 'PageSuccessController',
        ]);
    }
}

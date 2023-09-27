<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LeconsulgeneralController extends AbstractController
{
    #[Route('/leconsulgeneral', name: 'app_leconsulgeneral')]
    public function index(): Response
    {
        return $this->render('leconsulgeneral/index.html.twig', [
            'controller_name' => 'LeconsulgeneralController',
        ]);
    }
}

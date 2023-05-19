<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandecartedidentiteController extends AbstractController
{
    #[Route('/demandecartedidentite', name: 'app_demandecartedidentite')]
    public function index(): Response
    {
        return $this->render('demandecartedidentite/index.html.twig', [
            'controller_name' => 'DemandecartedidentiteController',
        ]);
    }
}

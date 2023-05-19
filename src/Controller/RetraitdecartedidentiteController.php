<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RetraitdecartedidentiteController extends AbstractController
{
    #[Route('/retraitdecartedidentite', name: 'app_retraitdecartedidentite')]
    public function index(): Response
    {
        return $this->render('retraitdecartedidentite/index.html.twig', [
            'controller_name' => 'RetraitdecartedidentiteController',
        ]);
    }
}

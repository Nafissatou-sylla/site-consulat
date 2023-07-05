<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvpourTranscriptionDecesController extends AbstractController
{
    #[Route('/rdvpour/transcription/deces', name: 'app_rdvpour_transcription_deces')]
    public function index(): Response
    {
        return $this->render('rdvpour_transcription_deces/index.html.twig', [
            'controller_name' => 'RdvpourTranscriptionDecesController',
        ]);
    }
}

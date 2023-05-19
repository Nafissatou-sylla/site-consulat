<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TranscriptionDeNaissanceController extends AbstractController
{
    #[Route('/transcription/de/naissance', name: 'app_transcription_de_naissance')]
    public function index(): Response
    {
        return $this->render('transcription_de_naissance/index.html.twig', [
            'controller_name' => 'TranscriptionDeNaissanceController',
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\PasseportDisponible;
use App\Form\PasseportDisponibleType;
use App\Repository\PasseportDisponibleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

#[Route('/passeport/disponible')]
class PasseportDisponibleController extends AbstractController
{
    #[Route('/new', name: 'app_passeport_disponible_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PasseportDisponibleRepository $passeportDisponibleRepository, EntityManagerInterface $entityManager, PersistenceManagerRegistry $doctrine): Response
    {
        $passeportDisponible = new PasseportDisponible();
        $form = $this->createForm(PasseportDisponibleType::class, $passeportDisponible);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           //vérification des éléments dans la base de donnée
           //utilisation de entity manager pour interagir avec la bdd
           $entityManager = $doctrine->getManager();
           $passeportDisponibleRepository= $entityManager->getRepository(PasseportDisponible::class);
            $result=  $passeportDisponibleRepository->findOneBy([
                'prenom' => $passeportDisponible->getPrenom(),
                'nom' => $passeportDisponible -> getNom(),
                'dateDeNaissance' => $passeportDisponible -> getDateDeNaissance(),
                'lieuDeNaissance' => $passeportDisponible -> getLieuDeNaissance(),
            ]);

            if($result) {
                $this->addFlash('success', 'votre passeport est disponible !');
                return $this->redirectToRoute('app_page_success', [], Response::HTTP_SEE_OTHER);
            }

            else {
                $this->addFlash('erreur', 'votre passeport nest pas disponible !');
                return $this->redirectToRoute('app_page_erreur', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->renderForm('passeport_disponible/new.html.twig', [
            'passeport_disponible' => $passeportDisponible,
            'form' => $form,
        ]);
    }
}

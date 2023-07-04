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
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/passeport/disponible')]
class PasseportDisponibleController extends AbstractController
{
    #[Route('/', name: 'app_passeport_disponible_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Vous n\'avez pas les droits suffisants pour accéder à la liste des passeports disponibles')]

    public function index(PasseportDisponibleRepository $passeportDisponibleRepository): Response
    {
        return $this->render('passeport_disponible/index.html.twig', [
            'passeport_disponibles' => $passeportDisponibleRepository->findAll(),
        ]);
    }

    #[Route('/find', name: 'app_passeport_disponible_find', methods: ['GET', 'POST'])]
    public function find(Request $request, PasseportDisponibleRepository $passeportDisponibleRepository, EntityManagerInterface $entityManager, PersistenceManagerRegistry $doctrine): Response
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

            return $this->renderForm('passeport_disponible/find.html.twig', [
                'passeport_disponible' => $passeportDisponible,
                'form' => $form,
            ]);

    }


    #[Route('/new', name: 'app_passeport_disponible_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN', message: 'Vous n\'avez pas les droits suffisants pour ajouter un passeport')]
    public function new(Request $request, PasseportDisponibleRepository $passeportDisponibleRepository): Response
    {
        $passeportDisponible = new PasseportDisponible();
        $form = $this->createForm(PasseportDisponibleType::class, $passeportDisponible);
        $form->handleRequest($request);     

        if ($form->isSubmitted() && $form->isValid()) {
            $passeportDisponibleRepository->save($passeportDisponible, true);

            return $this->redirectToRoute('app_passeport_disponible_show', ['id' => $passeportDisponible->getId()],  Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('passeport_disponible/new.html.twig', [
            'passeport_disponible' => $passeportDisponible,
            'form' => $form,
        ]);

    }


    #[Route('/{id}', name: 'app_passeport_disponible_show', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Vous n\'avez pas les droits suffisants ')]
    public function show(PasseportDisponible $passeportDisponible): Response
    {
        return $this->render('passeport_disponible/show.html.twig', [
            'passeport_disponible' => $passeportDisponible,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_passeport_disponible_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN', message: 'Vous n\'avez pas les droits suffisants pour modifier un passeport')]
    public function edit(Request $request, PasseportDisponible $passeportDisponible, PasseportDisponibleRepository $passeportDisponibleRepository): Response
    {
        $form = $this->createForm(PasseportDisponibleType::class, $passeportDisponible);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passeportDisponibleRepository->save($passeportDisponible, true);

            return $this->redirectToRoute('app_passeport_disponible_show', ['id' => $passeportDisponible->getId()],  Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('passeport_disponible/edit.html.twig', [
            'passeport_disponible' => $passeportDisponible,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_passeport_disponible_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN', message: 'Vous n\'avez pas les droits suffisants pour supprimer ')]
    public function delete(Request $request, PasseportDisponible $passeportDisponible, PasseportDisponibleRepository $passeportDisponibleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$passeportDisponible->getId(), $request->request->get('_token'))) {
            $passeportDisponibleRepository->remove($passeportDisponible, true);
        }

        return $this->redirectToRoute('app_passeport_disponible_index', [], Response::HTTP_SEE_OTHER);
    }
}
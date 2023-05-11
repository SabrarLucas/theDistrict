<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use App\Form\PlatType;
use App\Form\UserType;
use App\Entity\Utilisateur;
use App\Service\PictureService;
use App\Repository\PlatRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/users', 'admin_user_')]
class AdminUserController extends AbstractController
{
    #[Route('/', 'index')]
    public function users(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('admin/users/index.html.twig', [
            'users' => $utilisateurRepository->findAll()
        ]);
    }

    #[Route('/edition/{id}', 'edit')]
    public function edit(Utilisateur $utilisateur, Request $request, EntityManagerInterface $manager, PictureService $pictureService) : Response
    {
        // On verifie sur l'user peut editer avec les voter
        $this->denyAccessUnlessGranted('USER_EDIT', $utilisateur);

        $utilisateurForm = $this->createForm(UserType::class, $utilisateur);

        $utilisateurForm->handleRequest($request);

        if($utilisateurForm->isSubmitted() && $utilisateurForm->isValid()) {
            
            $utilisateur = $utilisateurForm->getData();
            
            $manager->persist($utilisateur);
            $manager->flush();

            $this->addFlash(
                'warning',
                'L\'utilisateur à bien été modifié.'
            );

            return $this->redirectToRoute('admin_user_index');
        }

        return $this->render('admin/users/edit.html.twig', [
            'utilisateurForm' => $utilisateurForm->createView()
        ]);
    }
}
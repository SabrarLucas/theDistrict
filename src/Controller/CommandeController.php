<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande/{id}', name: 'commande')]
    public function index($id, UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('pages/commande/index.html.twig', [
            'utilisateur' => $utilisateurRepository->findBy(['commandes' => $id])
        ]);
    }
}

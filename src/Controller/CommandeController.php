<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\DetailRepository;
use App\Repository\CommandeRepository;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande/{id}', name: 'commande')]
    public function index(Utilisateur $utilisateur): Response
    {
        return $this->render('pages/commande/commande.html.twig', [
            'utilisateur' => $utilisateur
        ]);
    }

    #[Route('/commande/detail/{id}', 'commande.detail')]
    public function detail(CommandeRepository $commande, DetailRepository $detailRepository, $id, PlatRepository $platRepository) : Response
    {
        return $this->render('pages/commande/detail.html.twig', [
            'commandes' => $commande->findBy(['id' => $id]),
            'details' => $detailRepository->findBy(['id' => $id]),
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Commande;
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
    public function index(Utilisateur $utilisateur, Commande $commande): Response
    {
        
        // dd($etat);
        // if($etat === 0) {
        //     $phrase = "Enregistée/payée";
        // }
        // elseif($etat === 1) {
        //     $phrase = "En préparation";
        // }
        // elseif($etat === 2) {
        //     $phrase = "En cours de livraison";
        // }
        // elseif($etat === 3) {
        //     $phrase = "Livrée";
        // }

        return $this->render('pages/commande/index.html.twig', [
            'utilisateur' => $utilisateur
        ]);
    }

    #[Route('/commande/detail/{id}', 'commande.detail')]
    public function detail(CommandeRepository $commande, DetailRepository $detailRepository, $id, PlatRepository $platRepository) : Response
    {
        return $this->render('pages/commande/detail.html.twig', [
            'commandes' => $commande->findBy(['id' => $id]),
            'details' => $detailRepository->findBy(['id' => $id]),
            'plats' => $platRepository->findBy(['id' => $id])
        ]);
    }
}

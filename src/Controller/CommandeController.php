<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Detail;
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
        // $etat = $commande->getEtat();
        
        // if($etat == 0) {
        //     $phrase = "Enre";
        // }
        // else if($etat == 3) {
        //     $phrase = "livrée";
        // }
        

        return $this->render('pages/commande/index.html.twig', [
            'utilisateur' => $utilisateur,
            //'etat' => $phrase
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

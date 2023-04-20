<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande/{id}', name: 'commande')]
    public function index(Utilisateur $utilisateur): Response
    {
        return $this->render('pages/commande/index.html.twig', [
            'utilisteur' => $utilisateur
        ]);
    }
}

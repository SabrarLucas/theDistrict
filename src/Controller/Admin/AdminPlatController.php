<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/plats', 'admin_plat_')]
class AdminPlatController extends AbstractController
{
    #[Route('/', 'index')]
    public function index() : Response
    {
        return $this->render('admin/plats/index.html.twig');
    }

    #[Route('/ajout', 'add')]
    public function add() : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/plats/index.html.twig');
    }

    #[Route('/edition/{id}', 'edit')]
    public function edit(Plat $plat) : Response
    {
        // On verifie sur l'user peut editer avec les voter
        $this->denyAccessUnlessGranted('PLAT_EDIT', $plat);

        return $this->render('admin/plats/index.html.twig');
    }

    #[Route('/suppression/{id}', 'delete')]
    public function delete(Plat $plat) : Response
    {
        // On verifie sur l'user peut supprimer avec les voter
        $this->denyAccessUnlessGranted('PLAT_DELETE', $plat);
        
        return $this->render('admin/plats/index.html.twig');
    }
}
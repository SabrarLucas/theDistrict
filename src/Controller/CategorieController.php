<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie')]
    public function index(CategorieRepository $repository): Response
    {
        return $this->render('pages/categorie/categorie.html.twig', [
            'categories' => $repository->findAll()
        ]);
    }

    #[Route('/categorie/{id}', 'categorie.plat')]
    public function platCat(Categorie $categorie) : Response
    {
        return $this->render('pages/categorie/platCat.html.twig', [
            'categorie' => $categorie
        ]);
    }
}
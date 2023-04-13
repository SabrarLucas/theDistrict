<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie')]
    public function index(CategorieRepository $repository): Response
    {
        return $this->render('pages/categorie/index.html.twig', [
            'categories' => $repository->findAll()
        ]);
    }

    #[Route('/categorie/{id}', 'categorie.plat')]
    public function platCat(CategorieRepository $categorieRepository, int $id, PlatRepository $platRepository) : Response
    {
        $categorie = $categorieRepository->findBy(["id" => $id]);


        return $this->render('pages/plat/platCat.html.twig', [
            'plats' => $platRepository->findAll()
        ]);
    }
}
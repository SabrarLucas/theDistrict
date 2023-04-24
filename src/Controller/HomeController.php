<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CategorieRepository $categorieRepository, PlatRepository $platRepository): Response
    {
        return $this->render('pages/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
            'plats' => $platRepository->findAll()
        ]);
    }
}
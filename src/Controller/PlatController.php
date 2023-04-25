<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlatController extends AbstractController
{
    #[Route('/plat', name: 'plat')]
    public function index(PlatRepository $platRepository): Response
    {
        return $this->render('pages/plat/index.html.twig', [
            'plats' => $platRepository->findAll()
        ]);
    }

    #[Route('/plat/{id}', 'plat.detail')]
    public function detailPlat(Plat $plat) : Response 
    {
        return $this->render('pages/plat/detail.html.twig', [
            'plat' => $plat
        ]);
    }
}

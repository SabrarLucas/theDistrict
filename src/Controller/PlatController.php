<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatController extends AbstractController
{
    #[Route('/plat', name: 'plat')]
    public function index(PlatRepository $platRepository): Response
    {
        return $this->render('pages/plat/index.html.twig', [
            'plats' => $platRepository->findAll()
        ]);
    }
}

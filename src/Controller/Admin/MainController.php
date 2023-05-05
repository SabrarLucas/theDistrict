<?php

namespace App\Controller\Admin;

use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin', 'admin_')]
class MainController extends AbstractController
{
    #[Route('/', 'index')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
}
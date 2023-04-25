<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'panier')]
    public function index(SessionInterface $session, PlatRepository $platRepository): Response
    {
        $panier = $session->get("panier", []);

        $dataPanier = [];
        $total = 0;

        foreach($panier as $id => $quantite) {
            $plat = $platRepository->find($id);
            $dataPanier[] = [
                "plat" => $plat,
                "quantite" => $quantite
            ];
            $total += $plat->getPrix() * $quantite;
        }

        return $this->render('pages/panier/panier.html.twig', compact("dataPanier", "total"));
    }

    #[Route('/panier/add/{id}', 'panier.add')]
    public function add(Plat $plat, SessionInterface $session)
    {
        $panier = $session->get("panier", []);
        $id = $plat->getId();

        if(!empty($panier[$id])) {
            $panier[$id]++;
        }else {
            $panier[$id] = 1;
        }

        $session->set("panier", $panier);

        return $this->redirectToRoute('panier');
    }

    #[Route('/panier/remove/{id}', 'panier.remove')]
    public function remove(Plat $plat, SessionInterface $session)
    {
        $panier = $session->get("panier", []);
        $id = $plat->getId();

        if(!empty($panier[$id])) {
            if($panier[$id] > 1) {
                $panier[$id]--;
            }else {
                unset($panier[$id]);
            }
        }

        $session->set("panier", $panier);

        return $this->redirectToRoute('panier');
    }

    #[Route('/panier/delete/{id}', 'panier.delete')]
    public function delete(Plat $plat, SessionInterface $session)
    {
        $panier = $session->get("panier", []);
        $id = $plat->getId();

        if(!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set("panier", $panier);

        return $this->redirectToRoute('panier');
    }

    #[Route('/panier/delete', 'panier.deleteAll')]
    public function deleteAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("panier");
    }
}
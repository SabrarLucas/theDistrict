<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use App\Form\PlatType;
use App\Repository\PlatRepository;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/plats', 'admin_plat_')]
class AdminPlatController extends AbstractController
{
    #[Route('/', 'index')]
    public function index(PlatRepository $platRepository) : Response
    {
        return $this->render('admin/plats/index.html.twig', [
            'plats' => $platRepository->findAll()
        ]);
    }

    #[Route('/ajout', 'add')]
    public function add(Request $request, EntityManagerInterface $manager, PictureService $pictureService) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $plat = new Plat;
        $platForm = $this->createForm(PlatType::class, $plat);

        $platForm->handleRequest($request);

        if($platForm->isSubmitted() && $platForm->isValid()) {

            $image = $platForm->get('image')->getData();

            $folder = 'plat';

            $fichier = $pictureService->add($image, $folder, 300, 300);

            $plat->setImage($fichier);
            
            $manager->persist($plat);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le plat à bien été ajouté.'
            );

            return $this->redirectToRoute('admin_plat_index');
        }

        return $this->render('admin/plats/add.html.twig', [
            'platForm' => $platForm->createView()
        ]);
    }

    #[Route('/edition/{id}', 'edit')]
    public function edit(Plat $plat, Request $request, EntityManagerInterface $manager, PictureService $pictureService) : Response
    {
        // On verifie sur l'user peut editer avec les voter
        $this->denyAccessUnlessGranted('PLAT_EDIT', $plat);

        $platForm = $this->createForm(PlatType::class, $plat);

        $platForm->handleRequest($request);

        if($platForm->isSubmitted() && $platForm->isValid()) {

            $image = $platForm->get('image')->getData();

            $plat = $platForm->getData();
            
            $folder = 'plat';

            $fichier = $pictureService->add($image, $folder, 300, 300);

            $plat->setImage($fichier);

            $manager->persist($plat);
            $manager->flush();

            $this->addFlash(
                'warning',
                'Le plat à bien été modifié.'
            );

            return $this->redirectToRoute('admin_plat_index');
        }

        return $this->render('admin/plats/edit.html.twig', [
            'platForm' => $platForm->createView(),
            'plat' => $plat
        ]);
    }

    #[Route('/suppression/{id}', 'delete')]
    public function delete(Plat $plat, EntityManagerInterface $manager) : Response
    {
        // On verifie que l'user peut supprimer avec les voter
        $this->denyAccessUnlessGranted('PLAT_DELETE', $plat);

        $manager->remove($plat);
        $manager->flush();

        $this->addFlash(
            'danger',
            'Le plat a bien été supprimé'
        );
        
        return $this->redirectToRoute('admin_plat_index');
    }
}
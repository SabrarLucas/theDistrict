<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/categories', 'admin_categorie_')]
class AdminCategorieController extends AbstractController
{
    #[Route('/', 'index')]
    public function index() : Response
    {
        return $this->render('admin/categories/index.html.twig');
    }

    #[Route('/ajout', 'add')]
    public function add(Request $request, EntityManagerInterface $manager, PictureService $pictureService) : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $categorie = new Categorie;
        $categorieForm = $this->createForm(CategorieType::class, $categorie);

        $categorieForm->handleRequest($request);

        if($categorieForm->isSubmitted() && $categorieForm->isValid()) {
            $images = $categorieForm->get('image')->getData();
            foreach($images as $image){
                $folder = 'categorie';

                $fichier = $pictureService->add($image, $folder, 300, 300);

                $categorie->setImage($fichier);
            }

            $categorie = $categorieForm->getData();
            
            $manager->persist($categorie);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le categorie à bien été ajouté.'
            );

            return $this->redirectToRoute('admin_categorie_index');
        }

        return $this->render('admin/categories/add.html.twig', [
            'categorieForm' => $categorieForm->createView()
        ]);
    }

    #[Route('/edition/{id}', 'edit')]
    public function edit(Categorie $categorie, Request $request, EntityManagerInterface $manager) : Response
    {
        // On verifie sur l'user peut editer avec les voter
        $this->denyAccessUnlessGranted('CATEGORIE_EDIT', $categorie);

        $categorieForm = $this->createForm(CategorieType::class, $categorie);

        $categorieForm->handleRequest($request);

        if($categorieForm->isSubmitted() && $categorieForm->isValid()) {
            $categorie = $categorieForm->getData();
            
            $manager->persist($categorie);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le categorie à bien été modifié.'
            );

            return $this->redirectToRoute('admin_categorie_index');
        }

        return $this->render('admin/categories/edit.html.twig', [
            'categorieForm' => $categorieForm->createView()
        ]);
    }

    #[Route('/suppression/{id}', 'delete')]
    public function delete(Categorie $categorie) : Response
    {
        // On verifie sur l'user peut supprimer avec les voter
        $this->denyAccessUnlessGranted('CATEGORIE_DELETE', $categorie);
        
        return $this->render('admin/categories/index.html.twig');
    }
}
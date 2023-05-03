<?php

namespace App\DataFixtures;

use App\Entity\Detail;
use App\Entity\Plat;
use App\Entity\Commande;
use App\Entity\Categorie;
use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    //     // Categories

    //     $categorie1 = new Categorie();
    //     $categorie1->setLibelle("Burger")
    //         ->setImage("burger_cat.jpg")
    //         ->setActive(true);

    //     $manager->persist($categorie1);

    //     $categorie2 = new Categorie();
    //     $categorie2->setLibelle("Pizza")
    //         ->setImage("pizza_cat.jpg")
    //         ->setActive(true);

    //     $manager->persist($categorie2);

    //     $categorie3 = new Categorie();
    //     $categorie3->setLibelle("Sandwich")
    //         ->setImage("sandwich_cat.jpg")
    //         ->setActive(true);

    //     $manager->persist($categorie3);

    //     // Plats

    //     $plat1 = new Plat();
    //     $plat1->setLibelle("Miam Burger")
    //         ->setDescription("Laissez vous emporter par son goût indescriptible.")
    //         ->setPrix(12.3)
    //         ->setImage("cheesburger.jpg")
    //         ->setActive(true)
    //         ->setCategorie($categorie1);

    //     $manager->persist($plat1);

    //     $plat2 = new Plat();
    //     $plat2->setLibelle("Pizza margherita")
    //         ->setDescription("La base des pizza, mais celle la ne vous laisseras pas indifferent")
    //         ->setPrix(15.99)
    //         ->setImage("pizza-margherita.jpg")
    //         ->setActive(true)
    //         ->setCategorie($categorie2);

    //     $manager->persist($plat2);

    //     $plat3 = new Plat();
    //     $plat3->setLibelle("Courgettes farcies")
    //         ->setDescription("En vrai de vrai heuresement on vend pas ce plat.")
    //         ->setPrix(18.76)
    //         ->setImage("courgettes_farcies.jpg")
    //         ->setActive(false)
    //         ->setCategorie($categorie1);

    //     $manager->persist($plat3);

    //     $plat4 = new Plat();
    //     $plat4->setLibelle("Sandwich fromage")
    //         ->setDescription("Du pain du boulanger et un fromage qui vient du petit traiteur du village.")
    //         ->setPrix(6.8)
    //         ->setImage("Food-Name-3631.jpg")
    //         ->setActive(true)
    //         ->setCategorie($categorie3);

    //     $manager->persist($plat4);

    //     $plat5 = new Plat();
    //     $plat5->setLibelle("Hamburger")
    //         ->setDescription("Un burger tout ce qu'il y a de plus simple mais bien meilleur que McDo")
    //         ->setPrix(10.5)
    //         ->setImage("hamburger.jpg")
    //         ->setActive(true)
    //         ->setCategorie($categorie1);

    //     $manager->persist($plat5);

        // Utilisateurs

        $user1 = new Utilisateur();
        $user1->setNom('Pinchon')
            ->setPrenom('Lucas')
            ->setEmail('lucas.pinchon@mail.fr')
            ->setTelephone('06 12 34 56 78')
            ->setRoles(['ROLE_ADMIN'])
            ->setPlainPassword('password');

        $manager->persist($user1);

        $user2 = new Utilisateur();
        $user2->setNom('Philipe')
            ->setPrenom('Jean')
            ->setEmail('jean.philipe@mail.fr')
            ->setTelephone('06 87 65 43 21')
            ->setRoles(['ROLE_USER'])
            ->setPlainPassword('password');

        $manager->persist($user2);

        // // Commandes

        // $commande1 = new Commande();
        // $commande1->setUtilisateur($user1)
        //     ->setTotal(12.5)
        //     ->setEtat(0);

        // $manager->persist($commande1);

        // $commande2 = new Commande();
        // $commande2->setUtilisateur($user1)
        //     ->setTotal(20.85)
        //     ->setEtat(3);

        // $manager->persist($commande2);

        // $commande3 = new Commande();
        // $commande3->setUtilisateur($user2)
        //     ->setTotal(16.54)
        //     ->setEtat(2);

        // $manager->persist($commande3);

    //     // Details

    //     $detail1 = new Detail();
    //     $detail1->setCommande($commande1)
    //         ->setPlat($plat5)
    //         ->setQuantite(2);

    //     $manager->persist($detail1);

    //     $detail2 = new Detail();
    //     $detail2->setCommande($commande2)
    //         ->setPlat($plat2)
    //         ->setQuantite(1);

    //     $manager->persist($detail2);

    //     $detail3 = new Detail();
    //     $detail3->setCommande($commande3)
    //         ->setPlat($plat4)
    //         ->setQuantite(3);

    //     $manager->persist($detail3);

        $manager->flush();
    }
}

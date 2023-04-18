<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Categories

        $categorie1 = new Categorie();
        $categorie1->setLibelle("Burger");
        $categorie1->setImage("burger_cat.jpg");
        $categorie1->setActive(true);

        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setLibelle("Pizza");
        $categorie2->setImage("pizza_cat.jpg");
        $categorie2->setActive(true);

        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3->setLibelle("Sandwich");
        $categorie3->setImage("sandwich_cat.jpg");
        $categorie3->setActive(true);

        $manager->persist($categorie3);

        // Plats

        $plat1 = new Plat();
        $plat1->setLibelle("Miam Burger");
        $plat1->setDescription("Laissez vous emporter par son goût indescriptible.");
        $plat1->setPrix(12.3);
        $plat1->setImage("cheesburger.jpg");
        $plat1->setActive(true);
        $plat1->setCategorie($categorie1);

        $manager->persist($plat1);

        $plat2 = new Plat();
        $plat2->setLibelle("Pizza margherita");
        $plat2->setDescription("La base des pizza, mais celle la ne vous laisseras pas indifferent");
        $plat2->setPrix(15.99);
        $plat2->setImage("pizza-margherita.jpg");
        $plat2->setActive(true);
        $plat2->setCategorie($categorie2);

        $manager->persist($plat2);

        $plat3 = new Plat();
        $plat3->setLibelle("Courgettes farcies");
        $plat3->setDescription("En vrai de vrai heuresement on vend pas ce plat.");
        $plat3->setPrix(18.76);
        $plat3->setImage("courgettes_farcies.jpg");
        $plat3->setActive(false);
        $plat3->setCategorie($categorie1);

        $manager->persist($plat3);

        $plat4 = new Plat();
        $plat4->setLibelle("Sandwich fromage");
        $plat4->setDescription("Du pain du boulanger et un fromage qui vient du petit traiteru du village.");
        $plat4->setPrix(6.8);
        $plat4->setImage("Food-Name-3631.jpg");
        $plat4->setActive(true);
        $plat4->setCategorie($categorie3);

        $manager->persist($plat4);

        $plat5 = new Plat();
        $plat5->setLibelle("Hamburger");
        $plat5->setDescription("Un burger tout ce qu'il y a de plus simple mais bien meilleur que McDo");
        $plat5->setPrix(10.5);
        $plat5->setImage("hamburger.jpg");
        $plat5->setActive(true);
        $plat5->setCategorie($categorie1);

        $manager->persist($plat5);

        // Utilisateurs

        $user1 = new Utilisateur();
        $user1->setNom('Pinchon');
        $user1->setPrenom('Lucas');
        $user1->setEmail('Lucas.pinchon@mail.fr');
        $user1->setTelephone('06 12 34 56 78');
        $user1->setPassword('password');

        $manager->persist($user1);

        $user2 = new Utilisateur();
        $user2->setNom('Pinchon');
        $user2->setPrenom('Lucas');
        $user2->setEmail('Lucas.pinchon@mail.fr');
        $user2->setTelephone('06 12 34 56 78');
        $user2->setPassword('password');

        $manager->persist($user2);

        $manager->flush();
    }
}

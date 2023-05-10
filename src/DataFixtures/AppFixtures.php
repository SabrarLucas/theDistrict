<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Utilisateurs

        $user1 = new Utilisateur();
        $user1->setNom('Pinchon')
            ->setPrenom('Lucas')
            ->setEmail('lucas.pinchon@mail.fr')
            ->setTelephone('06 12 34 56 78')
            ->setRoles(['ROLE_ADMIN'])
            ->setPlainPassword('password')
            ->setAdresse('30 Rue de Poulainville')
            ->setCp('80000')
            ->setVille('Amiens');

        $manager->persist($user1);

        $manager->flush();
    }
}

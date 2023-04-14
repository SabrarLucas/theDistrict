<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 3; $i++) {
            $categorie = new Categorie();
                $categorie->setLibelle($faker->name());
            
            $manager->persist($categorie);
        }

        
        $manager->flush();
    }
}

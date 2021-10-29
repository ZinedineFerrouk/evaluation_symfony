<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use App\Entity\Restaurant;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 15; $i++) {
            $ville[$i] = new Ville();
            $restaurant[$i] = new Restaurant();
            $proprietaire[$i] = new Proprietaire();

            $ville[$i]->setName($faker->city);
            $proprietaire[$i]->setName($faker->lastName)->setFirstname($faker->firstName)->setBirthDate($faker->dateTime)->setRestaurant($restaurant[$i]);
            $restaurant[$i]->setName($faker->company)->setAdress($faker->address)->setImage($faker->imageUrl(300, 150, 'food'))->setProprietaire($proprietaire[$i])->setVille($ville[$i]);

            $manager->persist($ville[$i]);
            $manager->persist($proprietaire[$i]);
            $manager->persist($restaurant[$i]);
        }



        $manager->flush();
    }
}

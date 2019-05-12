<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Entreprise;
use Cocur\Slugify\Slugify;
use Faker\Factory as faker;
use Doctrine\Migrations\Version\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = faker::create('FR-fr');
        $slugify = new Slugify();

        for ($l = 0; $l < 30; $l++) {

            $user = new User();

            $user->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setIntroduction($faker->sentence())
                ->setDescription($faker->paragraph(3))
                ->setHash('password');

            $manager->persist($user);
            
            $entreprise = new Entreprise();

            $title = $faker->sentence(2);
            $slug  = $slugify->slugify($title);
            $description = $faker->paragraph(3);


            $entreprise->setNom($title )
                ->setSlug($slug)
                ->setLeader($user)
                ->setDescription($description);
            $manager->persist($entreprise);
        }

        $manager->flush();
    }
}

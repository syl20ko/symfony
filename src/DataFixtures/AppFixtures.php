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

        for ($l = 1; $l < 29; $l++) {

            $user = new User();

            $user->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setIntroduction($faker->sentence())
                ->setDescription($faker->paragraph(3))
                ->setHash('password');

            $manager->persist($user);
           
        }

        for ($i = 1; $i < 29; $i++) {
            $entreprise = new Entreprise();

            $title = $faker->sentence();
            $slug  = $slugify->slugify($title);
            $description = $faker->paragraph(3);


            $entreprise->setNom($title . $i)
                ->setSlug($slug)
                ->setLeader($user)
                ->setDescription($description);
            $manager->persist($entreprise);
        }

        $manager->flush();
    }
}

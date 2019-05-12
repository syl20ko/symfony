<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Entreprise;
use Cocur\Slugify\Slugify;
use Faker\Factory as faker;
use Doctrine\Migrations\Version\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\zh_CN\DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = faker::create('FR-fr');
        $slugify = new Slugify();
        $users = [];

        for ($l = 0; $l < 30; $l++) {

            $user = new User();

            $user->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setIntroduction($faker->sentence())
                ->setDescription($faker->paragraph(3))
                ->setHash('password');

            $manager->persist($user);

            $users[] = $user;

            $entreprise = new Entreprise();

            $title = $faker->sentence(2);
            $slug  = $slugify->slugify($title);
            $description = $faker->paragraph(3);


            $entreprise->setNom($title)
                ->setSlug($slug)
                ->setLeader($user)
                ->setDescription($description);

            $manager->persist($entreprise);

            
        }

        for ($i = 0; $i < 60; $i++) {
            $article = new Article();
            
            $slug  = $slugify->slugify($title);
            $user = $users[mt_rand(0, count($users)- 1 )];
            $title = $faker->sentence(2);
            $content = $faker->paragraph(3);

            $article->setTitle($title)
                ->setContent($content)
                ->setSlug($slug)
                ->setCreatedAt(new \DateTime())
                ->setAuthor($user);

            $manager->persist($article);
        }

        $manager->flush();
    }
}

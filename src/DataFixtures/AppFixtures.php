<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Entreprise;
use Cocur\Slugify\Slugify;
use Faker\Factory as faker;
use Faker\Provider\zh_CN\DateTime;
use Doctrine\Migrations\Version\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = faker::create('FR-fr');
        $slugify = new Slugify();
        $users = [];
        
         //USERS
        for ($l = 0; $l < 30; $l++) {

            $user = new User();

            $user->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setIntroduction($faker->sentence())
                ->setDescription($faker->paragraph(3))
                ->setHash('password');

            $manager->persist($user);

            $users[] = $user;
            //ENTREPRISE
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
        //CATEGORY
        $categories = [];

        for ($c = 0; $c < 10; $c++) {
            $category = new Category();

            $category->setTitle($faker->word(1));

            $manager->persist($category);

            $categories[]= $category;

            
        }
        //ARTICLES
        for ($i = 0; $i < 60; $i++) {
            $article = new Article();

            $slug  = $slugify->slugify($title);
            $user = $users[mt_rand(0, count($users) - 1)];
            $title = $faker->sentence(2);
            $content = $faker->paragraph(3);

            $category = $categories[mt_rand(0, count($categories) - 1)];
            $article->setTitle($title)
                ->setContent($content)
                ->setCategory($category)
                ->setSlug($slug)
                ->setCreatedAt(new \DateTime())
                ->setAuthor($user);

            $manager->persist($article);
        }

        $manager->flush();
    }
}

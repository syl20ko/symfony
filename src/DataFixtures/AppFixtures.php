<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 30; $i++) {
            $entreprise = new Entreprise();

            $entreprise->setNom('Entreprise'.$i)
                        ->setLeader('Sylvain')
                        ->setDescription('<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam labore saepe perspiciatis magni sequi suscipit sunt dolor, libero et. Iste accusantium in quasi magnam? Eos consectetur est laboriosam minus eveniet?I</p>');
            $manager->persist($entreprise);
        }
        

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $personA = new Person();
        $personA->setName('John');
        $manager->persist($personA);

        $personB = new Person();
        $personB->setName('Claire');
        $manager->persist($personB);

        $personC = new Person();
        $personC->setName('Tim');
        $manager->persist($personC);

        $manager->flush();
    }
}

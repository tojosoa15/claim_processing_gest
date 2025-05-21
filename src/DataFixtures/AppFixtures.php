<?php

namespace App\DataFixtures;

use App\Entity\Vats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $vat = new Vats();
        $vat->setVatValue(10);
        $manager->persist($vat);

        $vat = new Vats();
        $vat->setVatValue(10);
        $manager->persist($vat);

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Payements;
use App\Entity\Status;
use App\Entity\Vats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $status = $manager->find(Status::class, 1); // Récupère le Status avec ID 1

        $payment = new Payements();
        $payment->setDateSubmitted(new \DateTime('2025-05-18'));
        $payment->setInvoiceNum(2301077);
        $payment->setClaimNum('M0115923');
        $payment->setClaimAmount(100.00);
        $payment->setPayementDate(new \DateTime('2025-05-18'));
        $payment->setStatus($status);
        $manager->persist($payment);

        $manager->flush();
    }
}

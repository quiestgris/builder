<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $service = new Service();
        $service->setName("Carrelage");
        $service ->setDetails("lorem ipsum");

        $service = new Service();
        $service->setName("Extension de maison");
        $service ->setDetails("lorem ipsum");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Cuisine");
        $service ->setDetails("lorem ipsum");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Terrasse");
        $service ->setDetails("lorem ipsum");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Terrasse");
        $service ->setDetails("lorem ipsum");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Terrasse");
        $service ->setDetails("lorem ipsum");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Salle de Bain");
        $service ->setDetails("lorem ipsum");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Chape-Fluid");
        $service ->setDetails("lorem ipsum");

        $manager->flush();
    }
}

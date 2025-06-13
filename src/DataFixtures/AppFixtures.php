<?php

namespace App\DataFixtures;

use App\Entity\Service;
use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Admin\AdminPasswordAuthenticatedadminInterface;

class AppFixtures extends Fixture
{   
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $hasher) {

        $this->passwordHasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {


        $admin = new Admin();
        $admin->setEmail ( 'admin@admin.fr' );
        $password = '123';
        $hasherPassword = $this->passwordHasher->hashPassword(
            $admin,
            $password
        ) ;
        $admin->setPassword( $hasherPassword );

        $manager->persist( $admin );


        $service = new Service();
        $service->setName("Carrelage");
        $service->setImg('{{asset("imgs/services/10519484.png")}}');
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit
        . Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Extension de maison");
        $service->setImg('{{asset("/imgs/services/R.png")}}');
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Cuisine");
        $service->setImg('{{asset("/imgs/services/loupin_12_2_0.png")}}');
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Terrasse");
        $service->setImg('{{asset("/imgs/services/Rd.png")}}');
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Salle de bain");
        $service->setImg('{{asset("/imgs/services/Salle-de-bain.png")}}');
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Chape-Fluide");
        $service->setImg('{{asset("/imgs/services/OIP.png")}}');
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit
        . Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $manager->flush();
    }
}

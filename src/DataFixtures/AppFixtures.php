<?php

namespace App\DataFixtures;

use App\Entity\Service;
use App\Entity\User;
use Symfony\Component\HttpFoundation\File\File;
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


        $admin = new User();
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
        $imgFile = "10519484.png";
        $service->setImageName($imgFile);
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit
        . Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Extension de maison");
        $imgFile = "R.png";
        $service->setImageName($imgFile);
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Cuisine");
        $imgFile = "loupin_12_2_0.png";
        $service->setImageName($imgFile);
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Terrasse");
        $imgFile = "Rd.png";
        $service->setImageName($imgFile);
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Salle de bain");
        $imgFile = "Rd.png";
        $service->setImageName($imgFile);
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $service = new Service();
        $service->setName("Chape-Fluide");
        $imgFile = "OIP.png";
        $service->setImageName($imgFile);
        // $service->setImg(__DIR__ . "public/imgs/services/10519484.png");
        $service ->setDetails("Lorem ipsum dolor sit amet consectetur adipisicing elit
        . Consequatur, provident corrupti sed suscipit ad excepturi. Cum temporibus sed nisi natus, labore voluptates ratione ipsam amet, quas voluptas eos culpa doloribus.");
        $manager->persist($service);

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;

use App\Entity\Client;
use App\Entity\SubUsers;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        for($i=0; $i<10; $i++){

        

            $client = new Client;
            $client->setName($faker->name)
                ->setPrenom($faker->name)
                ->setEmail($faker->email)
                ->setSolde(1000) 
                ->setPassword("azerty");

                $manager->persist($client);
                
            
        }

        $manager->flush();
    }
}

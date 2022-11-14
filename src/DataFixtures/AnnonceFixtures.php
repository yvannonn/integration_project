<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create();

        for($i=0;$i<10;$i++){
            $post = new Annonce;
            $post->setTitle('<p>' . join('</p><p>', $faker->words(5)) . '</p>')
                ->setContent( '<p>'.implode('</p></p>',$faker->sentences()).'</p>')
                ->setBudget($faker->numberBetween($min = 1000, $max = 9000))
                ->setPrixClick($faker->randomDigit)
                ->setDateDebut(new \DateTime())
                ->setDateFin($faker->dateTimeBetween($startDate = 'now', $timezone = null))
                ->setDuree($faker->dateTimeBetween($startDate = 'now', $timezone = null));
                $manager->persist($post);
                
        }
        
        $manager->flush();
    }
}

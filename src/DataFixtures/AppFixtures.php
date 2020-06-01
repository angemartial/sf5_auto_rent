<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\Car;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    { 
        $faker = Factory::create('FR-fr');
       
        for($i = 1; $i <= 30; $i++){

            $car = new Car();

            $title        = $faker->sentence();           
            $coverImage   = $faker->imageUrl(1000,350);
            $introduction = $faker->paragraph(2);
            $content      = '<p>' . join('<p></p>', $faker->paragraphs(5)) . '</p>';
           

            $car->setTitle($title)               
                ->setCoverImage($coverImage)
                ->setIntroduction($introduction)
                ->setContent($content)
                ->setPrice(mt_rand(1200,10000))
                ->setKilometer(mt_rand(15000, 250000));

                for($j = 1; $j <= mt_rand(2,5); $j++)
                {
                    $image = new Image();

                    $image->setUrl($faker->imageUrl())
                          ->setCaption($faker->sentence())
                          ->setCar($car);

                    $manager->persist($image);
                }

                $manager->persist($car);

        }
        
        $manager->flush();
    }
}

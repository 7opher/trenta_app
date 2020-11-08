<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');

        for($i = 1; $i <= 30; $i++) {
            $product = new Product();

            $title = $faker->sentence();
            $description = "<p>" . join("</p><p>", $faker->paragraphs(5)) . "</p>";
            $image = $faker->imageUrl(500,350);

            $product->setTitle($title)
                    ->setDescription($description)
                    ->setImage($image)
                    ->setPrice(mt_rand(40, 200));

            $manager->persist($product);
        }

        $manager->flush();
    }
}

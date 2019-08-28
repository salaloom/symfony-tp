<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Cocur\Slugify\Slugify;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        

        for ($i = 0; $i < 100; $i++) 
        {
        $product = new Product();
        $product->setName('Produit '. $i);
        $slugify = new Slugify();
        $product->setSlug($slugify->slugify('Produit'. $i));
        $manager->persist($product);
        }


        $manager->flush();
    }
}

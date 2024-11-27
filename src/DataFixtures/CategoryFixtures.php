<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $content = json_decode(
            file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Category.json'),
            true
        );
        foreach ($content as $category) {
            CategoryFactory::createOne($category);
        }
    }
}

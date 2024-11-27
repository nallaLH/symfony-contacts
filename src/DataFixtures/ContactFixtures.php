<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\ContactFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use function Zenstruck\Foundry\faker;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ContactFactory::createMany(150, function () {
            $category = ['category' => null];
            if (faker()->boolean(90)) {
                $category = ['category' => CategoryFactory::random()];
            }

            return $category;
        });
    }
}

<?php

namespace App\Tests\Controller\Contact;

use App\Factory\UserFactory;
use App\Tests\Support\ControllerTester;

class CreateCest
{
    public function form(ControllerTester $I): void
    {
        $user = UserFactory::createOne(
            [
                'roles' => ['ROLE_USER'],
            ]
        )->_real();

        $I->amLoggedInAs($user);
        $I->amOnPage('/contact/create');
        $I->seeInTitle("Création d'un nouveau contact");
        $I->see("Création d'un nouveau contact", 'h1');
    }
}

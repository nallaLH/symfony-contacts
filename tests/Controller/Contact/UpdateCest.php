<?php

namespace App\Tests\Controller\Contact;

use App\Factory\ContactFactory;
use App\Factory\UserFactory;
use App\Tests\Support\ControllerTester;

class UpdateCest
{
    public function formShowsContactDataBeforeUpdating(ControllerTester $I): void
    {
        $user = UserFactory::createOne(
            [
                'roles' => ['ROLE_ADMIN'],
            ]
        )->_real();

        $I->amLoggedInAs($user);

        ContactFactory::createOne([
            'firstname' => 'Homer',
            'lastname' => 'Simpson',
        ]);

        $I->amOnPage('/contact/1/update');

        $I->seeInTitle('Modification d\'un contact');
        $I->see('Modification d\'un contact', 'h1');
    }
}

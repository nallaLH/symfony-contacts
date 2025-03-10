<?php

namespace App\Tests\Controller\Contact;

use App\Factory\ContactFactory;
use App\Factory\UserFactory;
use App\Tests\Support\ControllerTester;

class DeleteCest
{
    public function form(ControllerTester $I): void
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

        $I->amOnPage('/contact/1/delete');

        $I->seeInTitle('Suppression de Simpson, Homer');
        $I->see('Suppression de Simpson, Homer', 'h1');
    }

    public function accessIsRestrictedToAuthenticatedUsers(ControllerTester $I): void
    {
        $contact = ContactFactory::createOne();
        $contactId = $contact->getId();
        $I->amOnPage("/contact/{$contactId}/delete");
        $I->seeCurrentRouteIs('app_login');
    }

    public function accessIsRestrictedToAdminUsers(ControllerTester $I): void
    {
        $contact = ContactFactory::createOne();
        $user = UserFactory::createOne(
            [
                'roles' => ['ROLE_USER'],
            ]
        )->_real();
        $I->amLoggedInAs($user);
        $contactId = $contact->getId();
        $I->amOnPage("/contact/{$contactId}/delete");
        $I->seeResponseCodeIs(403);
    }
}

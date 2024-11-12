<?php

namespace App\Tests\Controller\Contact;

use App\Factory\ContactFactory;
use App\Tests\Support\ControllerTester;
use PHPUnit\Framework\Assert;

class IndexCest
{
    public function contactsListTest(ControllerTester $I)
    {
        ContactFactory::createMany(5);
        $I->amOnPage('/contact');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->seeNumberOfElements('li', 5);
        $I->seeNumberOfElements('a', 5);
    }

    public function contactLinkTest(ControllerTester $I)
    {
        $I->amOnPage('/contact');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->click('a.contact-link');
//        $I->click('a[class*="contact-link"]');
        $I->seeCurrentRouteIs('app_contact_show');
    }

    public function firstContactClickTest(ControllerTester $I)
    {
        ContactFactory::createOne(['lastName' => 'Aaaaaaaaaaaaaaa', 'firstName' => 'Joe']);
        ContactFactory::createMany(5);
        $I->amOnPage('/contact');
        $I->click('Aaaaaaaaaaaaaaa, Joe');
        $I->seeResponseCodeIs(200);
        $I->seeCurrentRouteIs('app_contact_show');
    }

    public function contactsAreSortedTest(ControllerTester $I)
    {
        ContactFactory::createSequence(
            [
                ['lastName' => 'Dupont', 'firstName' => 'Alice'],
                ['lastName' => 'Martin', 'firstName' => 'Hugo'],
                ['lastName' => 'Legrand', 'firstName' => 'Thomas'],
                ['lastName' => 'Dupont', 'firstName' => 'David'],
                ['lastName' => 'Petit', 'firstName' => 'Bob'],
            ]
        );

        $I->amOnPage('/contact');
        $actualOrder = $I->grabMultiple('a');
        $expectedOrder = [
            'Dupont, Alice',
            'Dupont, David',
            'Legrand, Thomas',
            'Martin, Hugo',
            'Petit, Bob'
        ];
        Assert::assertEquals($expectedOrder, $actualOrder);
    }
    //    // tests
    //    public function tryToTest(ControllerTester $I)
    //    {
    //    }
}

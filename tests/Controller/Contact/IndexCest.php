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
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->seeNumberOfElements('ul.contacts > li', 5);
        $I->seeNumberOfElements('a.contact', 5);
    }

    public function contactLinkTest(ControllerTester $I)
    {
        ContactFactory::createMany(5);
        $I->amOnPage('/contact');
        $I->seeResponseCodeIsSuccessful();
        $I->click('a.contact');
        $I->seeCurrentRouteIs('app_contact_show');
    }

    public function firstContactClickTest(ControllerTester $I)
    {
        ContactFactory::createOne(['lastName' => 'Aaaaaaaaaaaaaaa', 'firstName' => 'Joe']);
        ContactFactory::createMany(5);
        $I->amOnPage('/contact');
        $I->click('Aaaaaaaaaaaaaaa, Joe');
        $I->seeResponseCodeIsSuccessful();
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
        $actualOrder = $I->grabMultiple('a.contact');
        $expectedOrder = [
            'Dupont, Alice',
            'Dupont, David',
            'Legrand, Thomas',
            'Martin, Hugo',
            'Petit, Bob',
        ];
        Assert::assertEquals($expectedOrder, $actualOrder);
    }

    public function searchTest(ControllerTester $I)
    {
        ContactFactory::createSequence(
            [
                ['lastName' => 'Dupont', 'firstName' => 'Alice'],
                ['lastName' => 'Martin', 'firstName' => 'Hugo'],
                ['lastName' => 'Legrand', 'firstName' => 'Thomas'],
                ['lastName' => 'Therese', 'firstName' => 'David'],
            ]
        );
        $I->amOnPage('/contact?search=th');
        $I->seeResponseCodeIsSuccessful();
        $I->see('Therese, David');
        $I->see('Legrand, Thomas');
        $I->seeNumberOfElements('a.contact', 2);
    }
}

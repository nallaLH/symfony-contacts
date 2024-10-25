<?php

namespace App\Tests\Controller\Contact;

use App\Tests\Support\ControllerTester;

class IndexCest
{
    public function contactTest(ControllerTester $I)
    {
        $I->amOnPage('/contact');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->seeNumberOfElements('li', 195);
    }

    //    // tests
    //    public function tryToTest(ControllerTester $I)
    //    {
    //    }
}

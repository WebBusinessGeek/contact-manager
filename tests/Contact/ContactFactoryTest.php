<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 8:00 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\ContactFactory;
use Illuminate\Foundation\Testing\TestCase;

class ContactFactoryTest extends \TestCase {

    public function test_ContactFactory_createNewContact_method_creates_a_new_contact()
    {
        $contactFactory = new ContactFactory();

        $this->assertEquals('App\MyStuff\ContactDirectory\Contact', get_class($contactFactory->createNewContact()));
    }
}

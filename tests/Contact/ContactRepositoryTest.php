<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 1:01 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\Contact;
use App\MyStuff\ContactDirectory\ContactRepository;
use Illuminate\Foundation\Testing\TestCase as TestCase;

class ContactRepositoryTest extends  \TestCase{

    public function test_ContactRepository_getAllContactsInAccount_method_returns_all_contacts_associated_with_account()
    {
        $contactRepo = new ContactRepository();

        $this->assertEquals('App\MyStuff\ContactDirectory\Contact', get_class($contactRepo->getAllContactsInAccount(1)[0]));

        $contact = $contactRepo->getAllContactsInAccount(1)[0];
        $this->assertEquals(1, $contact->contactAccount_id);

        $this->assertEquals(0, count($contactRepo->getAllContactsInAccount('a')));
    }


}

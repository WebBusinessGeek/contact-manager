<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 1:01 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\Contact;
use App\MyStuff\ContactDirectory\ContactInvoker;
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

    public function test_ContactRepository_getContactByName_method_gets_specified_contact_from_database()
    {
        $contactToStore = new Contact();
        $contactRepo = new ContactRepository();
        $contactInvoker = new ContactInvoker();

        $contactInvoker->addAttributesToContact($contactToStore, 'NameMan', 'email@email.com', '215-222-2222', 'Agriculture', 'Customer Support', 'Freelancer');
        $contactRepo->storeContactInAccount(1002, $contactToStore);

        $contact = $contactRepo->getContactByName(1002,'NameMan');
        $this->assertEquals('App\MyStuff\ContactDirectory\Contact', get_class($contact));
        $this->assertEquals('NameMan', $contact->name);


    }

    public function test_ContactRepository_storeContactInAccount_method_stores_a_contact_in_the_correct_account()
    {
        $contact = new Contact();
        $contactRepo = new ContactRepository();
        $contactInvoker = new ContactInvoker();

        $contactInvoker->addAttributesToContact($contact, 'NameMan2', 'email@email.com', '215-222-2222', 'Agriculture', 'Customer Support', 'Freelancer');

        $contactRepo->storeContactInAccount(1003, $contact);

        $contact = $contactRepo->getContactByName(1003, 'NameMan2');
        $this->assertEquals('App\MyStuff\ContactDirectory\Contact', get_class($contact));
        $this->assertEquals('NameMan2', $contact->name);

    }

    public function test_ContactRepository_getContactById_method_returns_specified_contact()
    {
        //create new contact with 
    }

}

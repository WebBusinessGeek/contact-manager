<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 8:10 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\Contact;
use App\MyStuff\ContactDirectory\ContactCommandController;
use App\MyStuff\ContactDirectory\ContactInvoker;
use Illuminate\Foundation\Testing\TestCase;

class ContactInvokerTest extends \TestCase {

    public function test_ContactInvoker_addAttributesToContact_method_adds_attributes_to_contact()
    {
        $contactInvoker = new ContactInvoker();

        $contact = new Contact();

        $contactInvoker->addAttributesToContact($contact, 'ContactName', 'Contact@contact.com', '215-555-4444','Agriculture','Customer Support', 'Freelancer');

        $this->assertEquals('ContactName', $contact->name);
        $this->assertEquals('Contact@contact.com', $contact->email);
        $this->assertEquals('215-555-4444', $contact->phone_number);
        $this->assertEquals('Agriculture', $contact->industry);
        $this->assertEquals('Customer Support', $contact->role);
        $this->assertEquals('Freelancer', $contact->contactRelation);
        $this->assertEquals(null, $contact->company);
    }

    public function test_ContactInvoker_updateContact_method_updates_a_contacts_attributes()
    {
        $contactInvoker = new ContactInvoker();

        $contact = new Contact();

        $contactInvoker->addAttributesToContact($contact, 'NameName', 'email@email.com', '215-555-5555', 'Agriculture', 'Customer Support', 'Freelancer');

        $attributes2 = [
            'name' => 'NameName2',

            'email' => 'email2@email.com',

            'phone_number' => '215-555-7777',

            'industry' => 'Agriculture',

            'role' => 'Customer Support',

            'contactRelation' => 'Freelancer',

            'company' => 'some company',

            'title' => 'President',

            'website' => 'http://website.com'
        ];
        $contactInvoker->updateContact($contact, $attributes2);


        $this->assertEquals('NameName2', $contact->name);
        $this->assertEquals('email2@email.com', $contact->email);
        $this->assertEquals('215-555-7777', $contact->phone_number);
        $this->assertEquals('Agriculture', $contact->industry);
        $this->assertEquals('Customer Support', $contact->role);
        $this->assertEquals('Freelancer', $contact->contactRelation);
        $this->assertEquals('some company', $contact->company);
        $this->assertEquals('President', $contact->title);
        $this->assertEquals('http://website.com', $contact->website);

        //update the attributes again
        $attributes3 = [
            'name' => 'NameName3',

            'email' => 'email3@email.com',

            'phone_number' => '609-555-7777',

            'industry' => 'Agriculture',

            'role' => 'Customer Support',

            'contactRelation' => 'Freelancer',

            'company' => 'some company',

            'title' => 'President',

            'website' => 'http://website.com'
        ];
        $contactInvoker->updateContact($contact, $attributes3);

        $this->assertEquals('NameName3', $contact->name);
        $this->assertEquals('email3@email.com', $contact->email);
        $this->assertEquals('609-555-7777', $contact->phone_number);
        $this->assertEquals('Agriculture', $contact->industry);
        $this->assertEquals('Customer Support', $contact->role);
        $this->assertEquals('Freelancer', $contact->contactRelation);
        $this->assertEquals('some company', $contact->company);
        $this->assertEquals('President', $contact->title);
        $this->assertEquals('http://website.com', $contact->website);
    }


    public function test_contactInvoker_deleteContact_method_deletes_a_contact()
    {
        $contactInvoker = new ContactInvoker();

        $contactCmmdCtrl = new ContactCommandController();

        $contactCmmdCtrl->store(1, 'SomeCoolName12344321', 'email@email.com', '215-555-5555', 'Agriculture', 'Customer Support', 'Freelancer');

        $contact = $contactCmmdCtrl->repository->getContactByName(1,'SomeCoolName12344321');

        $this->assertEquals('SomeCoolName12344321', $contact->name);
        $this->assertEquals('email@email.com', $contact->email);

        //delete the contact and test to prove its no longer in the database
        $contactInvoker->deleteContact($contact);

        $afterDeleteContact = $contactCmmdCtrl->repository->getContactByName(1,'SomeCoolName12344321');
        $this->assertNull($afterDeleteContact);

    }
}

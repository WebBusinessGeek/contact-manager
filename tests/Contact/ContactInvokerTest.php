<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 8:10 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\Contact;
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
}

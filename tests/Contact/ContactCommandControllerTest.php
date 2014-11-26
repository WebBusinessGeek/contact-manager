<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 12:51 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\ContactCommandController;
use Illuminate\Foundation\Testing\TestCase as TestCase;

class ContactCommandControllerTest extends \TestCase {

    public function test_ContactCommandController_index_method_returns_all_contacts_in_account_or_sends_message()
    {
        $contactCmmdCtrl = new ContactCommandController();

        $this->assertEquals('App\MyStuff\ContactDirectory\Contact', get_class($contactCmmdCtrl->index(1)[0]));

        $this->assertEquals('No contacts', $contactCmmdCtrl->index('a'));
    }

    public function test_ContactCommandController_store_method_stores_a_new_resource_in_contacts_table()
    {
        $contactCmmdCtrl = new ContactCommandController();

        $goodResponse = $contactCmmdCtrl->store(1135, 'NameGoodAll', 'somename@someemail.com','214-554-4455', 'Agriculture', 'Customer Support', 'Freelancer');
        $this->assertEquals('Stored', $goodResponse);

        $badResponseEmail = $contactCmmdCtrl->store(1135, 'NameBadEmail', 'come', '215-335-4554','Agriculture', 'Customer Support', 'Freelancer');
        $this->assertEquals('Bad format for email, phone number, or url', $badResponseEmail);

        $badResponsePhone = $contactCmmdCtrl->store(1135, 'NameBadPhone', 'name2@email.com', '215-3354444','Agriculture', 'Customer Support', 'Freelancer');
        $this->assertEquals('Bad format for email, phone number, or url', $badResponsePhone);

        $badResponseURL = $contactCmmdCtrl->store(1135, 'NameBadURL', 'namenamename@email.com', '215-335-4754','Agriculture', 'Customer Support', 'Freelancer',null,null,'www.www');
        $this->assertEquals('Bad format for email, phone number, or url', $badResponseURL);

        $contactCheckIfStoredInDB = $contactCmmdCtrl->repository->getContactByName(1135, 'NameGoodAll');

        $this->assertEquals('NameGoodAll', $contactCheckIfStoredInDB->name);
        $this->assertEquals('somename@someemail.com', $contactCheckIfStoredInDB->email);
        $this->assertEquals('214-554-4455', $contactCheckIfStoredInDB->phone_number);

        //DELETE the INSTANCES AFTER!!!!
    }

    public function test_ContactCommandController_show_method_retrieves_a_specified_contact_resource()
    {


        //DELETE THE INSTANCES AFTER!!!
    }

}

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


    }

    public function test_ContactCommandController_show_method_retrieves_a_specified_contact_resource()
    {
        $contactCmmdCtrl = new ContactCommandController();

        $contactWithId1 = $contactCmmdCtrl->show(1);
        $contactWithId2 = $contactCmmdCtrl->show(2);

        $this->assertEquals(1, $contactWithId1->id);
        $this->assertEquals(2, $contactWithId2->id);
        $this->assertEquals('No contact by that id', $contactCmmdCtrl->show(3434389239));

    }

    public function test_ContactCommandController_update_method_updates_a_specified_contact_resource()
    {
        $contactCmmdCtrl = new ContactCommandController();

        $contact = $contactCmmdCtrl->store(1, 'SomeName4545451', 'someemail@email.com', '215-455-3535', 'Agriculture', 'Customer Support', 'Freelancer');

        $contact = $contactCmmdCtrl->repository->getContactByName(1, 'SomeName4545451');

        $newAttributes2 = [

            'name' => 'SomeName4545452',

            'email' => 'someemail2@email.com',

            'phone_number' => '609-744-7557',

            'industry' => 'Agriculture',

            'role' => 'Customer Support',

            'contactRelation' => 'Freelancer',

            'company' => 'someCompany',

            'title' => null,

            'website' =>null
        ];

        $contactCmmdCtrl->update($contact->id, $newAttributes2);

        $updatedContact = $contactCmmdCtrl->show($contact->id);

        $this->assertEquals('SomeName4545452', $updatedContact->name);
        $this->assertEquals('someemail2@email.com', $updatedContact->email);
        $this->assertEquals('609-744-7557', $updatedContact->phone_number);
        $this->assertEquals('Agriculture', $updatedContact->industry);

        $newAttributes3 = [

            'name' => 'SomeName4545453',

            'email' => 'someemail3@email.com',

            'phone_number' => '201-445-5667',

            'industry' => 'Agriculture',

            'role' => 'Customer Support',

            'contactRelation' => 'Freelancer',

            'company' => 'someCompany',

            'title' => null,

            'website' =>null
        ];

        $contactCmmdCtrl->update($contact->id, $newAttributes3);

        $updatedContact2 = $contactCmmdCtrl->show($contact->id);

        $this->assertEquals('SomeName4545453', $updatedContact2->name);
        $this->assertEquals('someemail3@email.com', $updatedContact2->email);
        $this->assertEquals('201-445-5667', $updatedContact2->phone_number);
        $this->assertEquals('Agriculture', $updatedContact2->industry);


    }

}

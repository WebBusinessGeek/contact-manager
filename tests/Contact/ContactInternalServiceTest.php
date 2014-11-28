<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/28/14
 * Time: 12:44 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\ContactInternalService;
use Illuminate\Foundation\Testing\TestCase;

class ContactInternalServiceTest extends \TestCase {

    public function test_contactInternalService_index_method_returns_all_contacts_in_specified_account()
    {
        $contactInternalService = new ContactInternalService();

        $this->assertEquals('App\MyStuff\ContactDirectory\Contact', get_class($contactInternalService->index(1)[0]));

        $this->assertEquals('Illuminate\Database\Eloquent\Collection', get_class($contactInternalService->index(1)));

        $this->assertEquals('No contacts', $contactInternalService->index(304348392039842938298));

    }

    public function test_contactInternalService_store_method_saves_contact_in_specified_account()
    {
        $contactInternalService = new ContactInternalService();

        $contactInternalService->store(1, 'AWayCoolerName233233', 'awaycool@email.com', '215-344-3444', 'Agriculture', 'Customer Support', 'Freelancer');

        $contact = $contactInternalService->commandController->repository->getContactByName(1,'AWayCoolerName233233');

        $this->assertEquals('AWayCoolerName233233', $contact->name);
        $this->assertEquals('awaycool@email.com', $contact->email);
        $this->assertEquals('215-344-3444', $contact->phone_number);
    }

    public function test_contactInternalService_show_method_retrieves_specified_contact_resource()
    {
        $contactInternalService = new ContactInternalService();


        $contactInternalService->store(1, 'ThisIsANameMan45596', 'socoolemail@email.com', '215-949-2344', 'Agriculture', 'Customer Support', 'Freelancer');


        $contact = $contactInternalService->commandController->repository->getContactByName(1,'ThisIsANameMan45596');

        $this->assertEquals('ThisIsANameMan45596', $contact->name);
        $id = $contact->id;

        $contactViaShowMethod = $contactInternalService->show($id);

        $this->assertEquals('ThisIsANameMan45596', $contactViaShowMethod->name);
        $this->assertEquals('App\MyStuff\ContactDirectory\Contact', get_class($contactViaShowMethod));
    }


    public function test_contactInternalService_update_method_updates_a_specified_contact()
    {
        $contactInternalService = new ContactInternalService();

        $contactInternalService->store(1, 'TheLamestNameEver13123231', 'supercoolish@email.com', '215-385-4354', 'Agriculture', 'Customer Support', 'Freelancer');

        $contact = $contactInternalService->commandController->repository->getContactByName(1, 'TheLamestNameEver13123231');


        $this->assertEquals('TheLamestNameEver13123231', $contact->name);
        $this->assertEquals('supercoolish@email.com', $contact->email);
        $this->assertEquals('215-385-4354', $contact->phone_number);
        $this->assertEquals(null, $contact->company);

        $newAttributes = [
            'name' => 'TheNewestNameEver13123231',

            'email' => 'SuperGoblin@email.com',

            'phone_number' => '231-457-9867',

            'industry' => 'Agriculture',

            'role' => 'Customer Support',

            'contactRelation' => 'Freelancer',

            'company' => 'someCompany',

            'title' => null,

            'website' => null

        ];

        $contactInternalService->update($contact->id, $newAttributes);

        $updatedContact = $contactInternalService->commandController->show($contact->id);


        $this->assertEquals('TheNewestNameEver13123231', $updatedContact->name);
        $this->assertEquals('SuperGoblin@email.com', $updatedContact->email);
        $this->assertEquals('231-457-9867', $updatedContact->phone_number);
        $this->assertEquals('someCompany', $updatedContact->company);


        $contactInternalService->commandController->destroy($updatedContact->id);
    }

    public function test_contactInternalService_destroy_method_deletes_a_specified_contact_from_table_in_db()
    {

    }
}

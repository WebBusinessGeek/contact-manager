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

        //confirm attributes
        $this->assertEquals('AWayCoolerName233233', $contact->name);
        $this->assertEquals('awaycool@email.com', $contact->email);
        $this->assertEquals('215-344-3444', $contact->phone_number);
    }

    public function test_contactInternalService_update_method_updates_a_specified_contact()
    {

    }

    public function test_contactInternalService_destroy_method_deletes_a_specified_contact_from_table_in_db()
    {

    }
}

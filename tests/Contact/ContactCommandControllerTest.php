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

}

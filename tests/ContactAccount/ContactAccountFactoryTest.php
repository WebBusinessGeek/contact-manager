<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/1/14
 * Time: 1:25 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccountFactory;

class ContactAccountFactoryTest extends \PHPUnit_Framework_TestCase {

    public function test_ContactAccountFactory_createNewContactAccount_method_creates_a_new_contactAccount_resource()
    {
        $contactAccountFactory = new ContactAccountFactory();

        $contact = $contactAccountFactory->createNewContactAccount();

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contact));
    }

}

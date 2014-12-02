<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/2/14
 * Time: 11:12 AM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccount;
use App\MyStuff\ContactAccount\ContactAccountValidator;

class ContactAccountValidatorTest extends \PHPUnit_Framework_TestCase {

    public function test_contactAccountValidator_isAContactAccount_method_returns_boolean_if_passed_argument_is_instanceOf_contactAccount_class()
    {
        $contactAccountValidator = new ContactAccountValidator();

        $contactAccount = new ContactAccount();

        $notAContactAccount = 'Im not a contact account';

        $this->assertEquals(true, $contactAccountValidator->isAContactAccount($contactAccount));
        $this->assertEquals(false, $contactAccountValidator->isAContactAccount($notAContactAccount));
    }

}

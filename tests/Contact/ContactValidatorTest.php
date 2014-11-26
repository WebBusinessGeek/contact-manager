<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 9:05 PM
 */

namespace tests\Contact;


use App\MyStuff\ContactDirectory\ContactValidator;

class ContactValidatorTest extends \PHPUnit_Framework_TestCase {


    public function test_contactValidator_isValidEmailFormat_method_returns_if_valid_email_was_passed()
    {
        $contactValidator = new ContactValidator();

        $validEmail = 'name@example.com';
        $invalidEmail = 'name';

        $this->assertEquals(true, $contactValidator->isValidEmailFormat($validEmail));
        $this->assertEquals(false, $contactValidator->isValidEmailFormat($invalidEmail));
    }


    public function test_contactValidator_isValidURLFormat_method_returns_if_valid_url_was_passed()
    {

    }


    public function test_contactValidator_isValidPhoneNumberFormat_method_returns_if_valid_phone_number_was_passed()
    {

    }



}

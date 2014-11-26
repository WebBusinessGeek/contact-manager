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
        $invalidEmail1 = 'me@name';
        $invalidEmail2 = 'me@.com';
        $invalidEmail3 = '@example.com';

        $this->assertEquals(true, $contactValidator->isValidEmailFormat($validEmail));
        $this->assertEquals(false, $contactValidator->isValidEmailFormat($invalidEmail1));
        $this->assertEquals(false, $contactValidator->isValidEmailFormat($invalidEmail2));
        $this->assertEquals(false, $contactValidator->isValidEmailFormat($invalidEmail3));
    }


    public function test_contactValidator_isValidURLFormat_method_returns_if_valid_url_was_passed()
    {
        $contactValidator = new ContactValidator();

        $validURL = 'http://www.example.com';
        $validURL2 = 'http://www.example.com';
        $invalidURL1 = 'website.me';
        $invalidURL2 = 'heer.';
        $invalidURL3 = 'http://';

        $this->assertEquals(true, $contactValidator->isValidURLFormat($validURL));
        $this->assertEquals(true, $contactValidator->isValidURLFormat($validURL2));
        $this->assertEquals(false, $contactValidator->isValidURLFormat($invalidURL1));
        $this->assertEquals(false, $contactValidator->isValidURLFormat($invalidURL2));
        $this->assertEquals(false, $contactValidator->isValidURLFormat($invalidURL3));
    }


    public function test_contactValidator_isValidPhoneNumberFormat_method_returns_if_valid_phone_number_was_passed()
    {

    }



}

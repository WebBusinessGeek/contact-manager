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
        $contactValidator = new ContactValidator();

        $validPhoneNumber = '215-555-5555';
        $validPhoneNumber2 = '1-215-555-5555';
        $invalidPhoneNumber1 = '215-5555555';
        $invalidPhoneNumber2 = '2155555555';
        $invalidPhoneNumber3 = '215555-5555';

        $this->assertEquals(true, $contactValidator->isValidPhoneNumberFormat($validPhoneNumber));
        $this->assertEquals(true, $contactValidator->isValidPhoneNumberFormat($validPhoneNumber2));
        $this->assertEquals(false, $contactValidator->isValidPhoneNumberFormat($invalidPhoneNumber1));
        $this->assertEquals(false, $contactValidator->isValidPhoneNumberFormat($invalidPhoneNumber2));
        $this->assertEquals(false, $contactValidator->isValidPhoneNumberFormat($invalidPhoneNumber3));
    }

    public function test_contactValidator_isValidAll_method_returns_if_valid_email_url_and_phonenumber_was_passed()
    {
        $contactValidator = new ContactValidator();
        $validGroup1 = [
            'name@example.com',
            'http://www.example.com',
            '215-555-5555'
        ];

        $validGroup2 = [
            'me@name.com',
            'http://www.example.com',
            '1-215-555-5555'
        ];

        $invalidGroup1 = [
            'me@.com',
            'website.me',
            '215-5555555'
        ];

        $invalidGroup2 = [
            '@example.com',
            'heer.',
            '2155555555'
        ];

        $this->assertEquals(true, $contactValidator->isValidAll($validGroup1[0], $validGroup1[2], $validGroup1[1]));
        $this->assertEquals(true, $contactValidator->isValidAll($validGroup2[0], $validGroup2[2], $validGroup2[1]));
        $this->assertEquals(false, $contactValidator->isValidAll($invalidGroup1[0], $invalidGroup1[2], $invalidGroup1[1]));
        $this->assertEquals(false, $contactValidator->isValidAll($invalidGroup2[0], $invalidGroup2[2], $invalidGroup2[1]));
        $this->assertEquals(true, $contactValidator->isValidAll($validGroup1[0], $validGroup1[2]));
    }

    public function test_ContactValidator_isValidAttributes_returns_if_valid_attributes_were_passed()
    {
        $contactValidator = new ContactValidator();

        $validAttributes = [
            'name' => 'SomeName',
            'email' => 'email@email.com',
            'phone_number' => '215-255-2555',
            'industry' => 'Agriculture',
            'role' => 'Customer Support',
            'contactRelation' => 'Freelancer',
            'company' => null,
            'title' => null,
            'website' => null,
        ];

        $invalidAttributes = [
            'name' => 'SomeName',
            'email' => 'email@email.com',
            'phone_number' => '215-255-2555',
            'industry' => 'Agriculture',
        ];

        $invalidAttributes2 = [
            'name' => 'SomeName',
            'email' => null,
            'phone_number' => '215-255-2555',
            'industry' => 'Agriculture',
            'role' => 'Customer Support',
            'contactRelation' => 'Freelancer',
            'company' => null,
            'title' => null,
            'website' => null,
        ];

        $invalidAttributes3 = [
            'name' => null,
            'email' => 'email@email.com',
            'phone_number' => '215-255-2555',
            'industry' => 'Agriculture',
            'role' => 'Customer Support',
            'contactRelation' => 'Freelancer',
            'company' => null,
            'title' => null,
            'website' => null,
        ];

        $this->assertEquals(true, $contactValidator->isValidAttributes($validAttributes));
        $this->assertEquals(false, $contactValidator->isValidAttributes($invalidAttributes));
        $this->assertEquals(false, $contactValidator->isValidAttributes($invalidAttributes2));
        $this->assertEquals(false, $contactValidator->isValidAttributes($invalidAttributes3));
    }




}

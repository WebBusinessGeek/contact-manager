<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/4/14
 * Time: 6:31 PM
 */

namespace tests\User;


use App\MyStuff\UserDirectory\UserValidator;
use App\User;
use Illuminate\Foundation\Testing\TestCase;

class UserValidatorTest extends \TestCase {

    public function test_userValidator_isValidPassword_method_ensures_password_requirements_are_followed()
    {
        $userValidator = new UserValidator();

        //good passwords
        $goodPassword1 = '!@#$$%12SDFEWEseldfis32398';
        $goodPassword2 = 'HappyJoyJoy232328sdfjsl!##';
        $goodPassword3 = 'Qasldfuwe2392480d%%@#';

        //bad passwords
        $badPassword1 = 'noNumber';
        $badPassword2 = 'short1';
        $badPassword3 = 'illegal())*';

        //assert true the good passwords
        $this->assertEquals(true, $userValidator->isValidPassword($goodPassword1));
        $this->assertEquals(true, $userValidator->isValidPassword($goodPassword2));
        $this->assertEquals(true, $userValidator->isValidPassword($goodPassword3));


        //assert false the bad passwords
        $this->assertFalse($userValidator->isValidPassword($badPassword1));
        $this->assertFalse($userValidator->isValidPassword($badPassword2));
        $this->assertFalse($userValidator->isValidPassword($badPassword3));
    }

    public function test_userValidator_isValidEmailAndPassword_method_returns_boolean_if_passed_in_email_and_password_follows_guidelines()
    {
        $userValidator = new UserValidator();

        //goodArrays
        $good1 = [
            'email' => 'someEmail@email.com',
            'password' => '!@#$$%12SDFEWEseldfis32398'
        ];

        $good2 = [
            'email' => 'someEmail@gmail.edu',
            'password' => 'HappyJoyJoy232328sdfjsl!##'
        ];

        $good3 = [
            'email' => 'another@kmail.edu',
            'password' => 'Qasldfuwe2392480d%%@#'
        ];

        //bad arrays
        $bad1 = [
            'email' => 'email.com',
            'password' => '!@#$$%12SDFEWEseldfis32398'
        ];

        $bad2 = [
            'email' => 'some@email.com',
            'password' => 'noNumbers'
        ];

        $bad3 = [
            'email' => 'some@email.com',
            'password' => 'short1'
        ];

        //assert good groups
        $this->assertTrue($userValidator->isValidEmailAndPassword($good1['email'], $good1['password']));
        $this->assertTrue($userValidator->isValidEmailAndPassword($good2['email'], $good2['password']));
        $this->assertTrue($userValidator->isValidEmailAndPassword($good3['email'], $good3['password']));

        //assert bad groups
        $this->assertFalse($userValidator->isValidEmailAndPassword($bad1['email'], $bad1['password']));
        $this->assertFalse($userValidator->isValidEmailAndPassword($bad2['email'], $bad2['password']));
        $this->assertFalse($userValidator->isValidEmailAndPassword($bad3['email'], $bad3['password']));
    }




    public function test_userValidator_isUserInstance_method_returns_boolean_if_passed_in_argument_is_a_User_instance()
    {
        //userValidator instance
        $userValidator = new UserValidator();

        //user instance
        $realUser = new User();

        //isUserInstance method call should assert true
        $this->assertTrue($userValidator->isUserInstance($realUser));

        //non user instance
        $nonUser = 'string';

        //isUserInstance method call should assert false
        $this->assertFalse($userValidator->isUserInstance($nonUser));

    }

    public function test_userValidator_newAttributesAreValid_method_returns_boolean_determining_if_attributes_passed_in_are_valid()
    {
//        //validator instance
//        $userValidator = new UserValidator();
//
//        //good attribute arrays
//        $goodAttr1 = [
//            'email' => 'someUser@email.com'
//        ];
//
//        $goodAttr2 = [
//            'email' => 'anotherUser@email.com'
//        ];
//
//        //bad attribute arrays
//        $badAttr1 = [
//            'mail' => 'someUser@email.com'
//        ];
//
//        $badAttr2 = [
//            'email' => 'mail.com'
//        ];
//
//
//        //assert good are true
//        $this->assertTrue($userValidator->isValidAttributes($goodAttr1));
//        $this->assertTrue($userValidator->isValidAttributes($goodAttr2));
//
//        //assert bad are false
//        $this->assertFalse($userValidator->isValidAttributes($badAttr1));
//        $this->assertFalse($userValidator->isValidAttributes($badAttr2));
    }


    public function test_userValidator_matchesArrayLength_method_checks_if_array_lengths_matches()
    {
        //validator instance
        $userValidator = new UserValidator();

        //arrays
        $arrayOf5 = [
            1,
            2,
            3,
            4,
            5
        ];

        $arrayOfFive = [
            'one',
            'two',
            'three',
            'four',
            'five'
        ];

        $arrayOf6 = [
            1,
            2,
            3,
            4,
            5,
            6
        ];

        $arrayOfSix = [
            'one',
            'two',
            'three',
            'four',
            'five',
            'six'
        ];

        //assert true
        $this->assertTrue($userValidator->matchesArrayLength($arrayOf5, $arrayOfFive));
        $this->assertTrue($userValidator->matchesArrayLength($arrayOf6, $arrayOfSix));

        //assert false
        $this->assertFalse($userValidator->matchesArrayLength($arrayOfFive, $arrayOfSix));
        $this->assertFalse($userValidator->matchesArrayLength($arrayOf5, $arrayOf6));
    }

    public function test_userValidator_matchesArrayKeys_method_checks_if_passed_in_array_matches_all_keys_on_second_array()
    {
        //validator instance
        $userValidator = new UserValidator();

        //arrays
        $array1 = [
            'one' => 1,

            'twos' => 2,

            'three' => 3
        ];

        $array2 = [
            'one' => 3,

            'twos' => 2,

            'three' => 1
        ];

        $array3 = [
            'threes' => 3,

            'twos' => 2,

            'ones' => 1
        ];

        $array4 = [
            'threes' => 1,

            'twos' => 2,

            'ones' =>1
        ];

        //assert true
        $this->assertTrue($userValidator->matchesArrayKeys($array1, $array2));
        $this->assertTrue($userValidator->matchesArrayKeys($array3, $array4));

        //assert false
        $this->assertFalse($userValidator->matchesArrayKeys($array1, $array3));
        $this->assertFalse($userValidator->matchesArrayKeys($array2, $array4));
    }

//    public function test_userValidator_isValidFormatLooper_method_dynamically_checks_values_of_attributes_passed_in()
//    {
//        //validator instance
//
//        //
//    }

}

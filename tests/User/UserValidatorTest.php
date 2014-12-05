<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/4/14
 * Time: 6:31 PM
 */

namespace tests\User;


use App\MyStuff\UserDirectory\UserValidator;
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

}

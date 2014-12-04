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

}

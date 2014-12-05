<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/4/14
 * Time: 8:09 PM
 */

namespace tests\User;


use App\MyStuff\UserDirectory\UserInvoker;
use App\User;
use Illuminate\Foundation\Testing\TestCase;

class UserInvokerTest extends \TestCase{

    public function test_userInvoker_addEmailAndPasswordToUser_method_adds_email_and_password_to_user_instace()
    {
        //create new user
        $userInvoker = new UserInvoker();

        $user = new User();

        //assert email and password are null
        $this->assertEquals(null, $user->email);
        $this->assertEquals(null, $user->password);

        //call addEmail.. method
        $userInvoker->addEmailAndPasswordToUser($user, 'myemail@email.com', 'password232123');

        //assert email and password are present
        $this->assertEquals('myemail@email.com', $user->email);
        $this->assertTrue(password_verify('password232123', $user->password));


    }
}

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


    public function test_userInvoker_addNewAttributesToUser_method_adds_passed_in_arguments_as_attributes_to_user_instance()
    {
        //invoker instance
        $userInvoker = new UserInvoker();

        //user instance
        $user = new User();

        //add attributes to user and assert them
        $user->email = 'userInvoker@addNewAttributesToUserMethodTest1.com';
        $this->assertEquals('userInvoker@addNewAttributesToUserMethodTest1.com', $user->email);

        //call addNewAttributesToUser method and assert the new attributes
        $attr = [
            'email' => 'userInvoker@addNewAttributesToUserMethodTest2.com'
        ];
        $updatedUser = $userInvoker->addNewAttributesToUser($user, $attr);
        $this->assertEquals('userInvoker@addNewAttributesToUserMethodTest2.com', $updatedUser->email);
    }

}

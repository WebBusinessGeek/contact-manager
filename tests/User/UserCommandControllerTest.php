<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 11:28 PM
 */

namespace tests\User;


use App\MyStuff\UserDirectory\UserCommandController;
use Illuminate\Foundation\Testing\TestCase;

class UserCommandControllerTest extends \TestCase{

    public function test_userCommandController_store_method_creates_and_stores_a_new_user_instance_in_users_database_table()
    {
        //call store method
        $userCommmandController = new UserCommandController();

        $userCommmandController->store('userCommandController@storeMethodTest1.com', 'thisisaValidPassword1234');

        //retrieve it and assert email and password to prove its there
        $user = $userCommmandController->repository->getUserByEmail('userCommandController@storeMethodTest1.com');
        $this->assertEquals('userCommandController@storeMethodTest1.com', $user->email);
        $this->assertTrue(password_verify('thisisaValidPassword1234', $user->password));

        //delete it
        $user->destroy($user->id);


        //call store method on bad email and assert error message
        $this->assertEquals('Invalid Email or Password format', $userCommmandController->store('bademail', 'goodpassword1231232'));

        //call store method on bad password and assert error message
        $this->assertEquals('Invalid Email or Password format', $userCommmandController->store('good@email.com', 'invalid'));
    }
}

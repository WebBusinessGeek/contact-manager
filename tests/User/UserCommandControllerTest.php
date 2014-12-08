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
use Symfony\Component\Security\Core\User\User;

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

    public function test_userCommandController_index_method_retrieves_all_users_from_users_database_table()
    {
        //new commandController
        $userCommandController = new UserCommandController();

        //call index method
        $users = $userCommandController->index();

        //assert its a collection
        $this->assertEquals('Illuminate\Database\Eloquent\Collection', get_class($users));

        //assert its first item is of the App/User class
        $this->assertEquals('App\User', get_class($users[0]));
    }


    public function test_userCommandController_show_method_retrieves_a_specific_user_from_users_database_table()
    {

        //userCommandController instance
        $userCommandController = new UserCommandController();

        //show method
        $realUser = $userCommandController->show(1);

        //assert id and App\User instance
        $this->assertEquals(1, $realUser->id); // - PHPUNIT WILL THROW ERROR IF NO SEED IN USERS TABLE HAS AN IDEA OF 1.
        $this->assertEquals('App\User', get_class($realUser));

        //show method on bad id and assert error message
        $this->assertEquals('No user by that id', $userCommandController->show('aaabbb'));
    }

    public function test_userCommandController_update_method_updates_a_user_instances_attributes()
    {
        //create User instance
        $userCommandController = new UserCommandController();
        $userCommandController->store('userCommandController@updateMethodTest1.com', 'testtesttest123');

        //assert user instances attributes
        $user = $userCommandController->repository->getUserByEmail('userCommandController@updateMethodTest1.com');
        $this->assertEquals('userCommandController@updateMethodTest1.com', $user->email);

        //call update method and assert new changes
        $attr = [
            'email' => 'userCommandController@updateMethodTest2.com'
        ];
        $userCommandController->update($user->id, $attr);

        $afterUpdateUser = $userCommandController->show($user->id);
        $this->assertEquals('userCommandController@updateMethodTest2.com', $afterUpdateUser->email);

        //delete user from db
        $afterUpdateUser->destroy($user->id);

        //call update method with inaccurate attributes and assert error message.
        $badAttr = [
            'bar' => 'foo',
            'baz' => 'boo',
        ];
        $this->assertEquals('User unidentified or Invalid attributes supplied.', $userCommandController->update('asdasre', $attr));
        $this->assertEquals('User unidentified or Invalid attributes supplied.', $userCommandController->update(1, $badAttr));
    }
}

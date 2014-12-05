<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/4/14
 * Time: 8:18 PM
 */

namespace tests\User;


use App\MyStuff\UserDirectory\UserInvoker;
use App\MyStuff\UserDirectory\UserRepository;
use App\User;
use Illuminate\Foundation\Testing\TestCase;


class UserRepositoryTest extends \TestCase {

    public function test_userRepository_saveUser_method_saves_user_instance_to_users_database_table()
    {
        $userRepo = new UserRepository();
        $userInvoker = new UserInvoker();

        $user = new User();
        $userInvoker->addEmailAndPasswordToUser($user, 'userRepository@saveUserMethodTest1', 'somePassword123');

        $userRepo->saveUser($user);
        $user = $userRepo->getUserByEmail('userRepository@saveUserMethodTest1');

        $this->assertEquals('App\User', get_class($user));

        $user->destroy($user->id);
    }

    public function test_userRepository_getUserByEmail_method_retrieves_user_from_users_database_table_by_email()
    {
        $userRepo = new UserRepository();
        $userInvoker = new UserInvoker();

        $user = new User();

        $userInvoker->addEmailAndPasswordToUser($user, 'userRepository@getUserByEmailMethodTest1', 'SomePassword123');

        $userRepo->saveUser($user);

        $userFromDB = $userRepo->getUserByEmail('userRepository@getUserByEmailMethodTest1');
        $this->assertEquals('App\User', get_class($userFromDB));
        $this->assertEquals('userRepository@getUserByEmailMethodTest1', $userFromDB->email);

        $userFromDB->destroy($userFromDB->id);
    }

    public function test_userRepository_getAllUsers_method_retrieves_all_users_from_users_database_table()
    {
        //new repo
        $userRepo = new UserRepository();

        //call getAllUsers
        $users = $userRepo->getAllUsers();

        //assert a collection
        $this->assertEquals('Illuminate\Database\Eloquent\Collection', get_class($users));

        //assert first item is App\User class
        $this->assertEquals('App\User', get_class($users[0]));

    }


    public function test_userRepository_getUserById_method_retrieves_a_user_from_database_by_its_id()
    {
        //user repo instance
        $userRepo = new UserRepository();

        //getUserById method
        $realUser = $userRepo->getUserById(1);

        //assert id and instance of App\User
        $this->assertEquals(1, $realUser->id);// - PHPUNIT WILL THROW AN ERROR IF THERE ARE NO SEEDS IN USER TABLE WITH ID OF 1
        $this->assertEquals('App\User', get_class($realUser));

        //assert ModelNotFound exception
        $this->setExpectedException('Illuminate\Database\Eloquent\ModelNotFoundException', 'No query results for model [App\User]');
        //getUserById on bad id
        $badUser = $userRepo->getUserById('aaabbb');


    }
}


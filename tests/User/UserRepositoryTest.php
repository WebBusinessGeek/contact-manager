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
}


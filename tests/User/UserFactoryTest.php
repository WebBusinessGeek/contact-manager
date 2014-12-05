<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/4/14
 * Time: 8:03 PM
 */

namespace tests\User;


use App\MyStuff\UserDirectory\UserFactory;
use Illuminate\Foundation\Testing\TestCase;

class UserFactoryTest extends \TestCase{

    public function test_userFactory_createNewUser_method_returns_a_new_user_instance()
    {
        $userFactory = new UserFactory();

        $this->assertEquals('App\User', get_class($userFactory->createNewUser()));
    }
}

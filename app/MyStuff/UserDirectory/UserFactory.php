<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:37 PM
 */

namespace App\MyStuff\UserDirectory;


use App\User;

class UserFactory {

    /**
     * Returns a new User instance.
     * @return User
     */
    public function createNewUser()
    {
        return new User();
    }

}
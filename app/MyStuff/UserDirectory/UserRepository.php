<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:37 PM
 */

namespace App\MyStuff\UserDirectory;



use App\User;

class UserRepository {

    /**
     * Saves a User instance to the users database table.
     * @param User $user
     */
    public function saveUser(User $user)
    {
        $user->save();
    }

    /**
     * Retrieves a User instance from users database table by email.
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email)
    {
        return User::where('email', '=', $email)->first();
    }

}
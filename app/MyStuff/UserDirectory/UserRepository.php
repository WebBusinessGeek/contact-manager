<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:37 PM
 */

namespace App\MyStuff\UserDirectory;



use App\User;
use Illuminate\Database\Eloquent\Collection;


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

    /**
     * Retrieves all User instances from users database table.
     * @return Collection|static[]
     */
    public function getAllUsers()
    {
        return User::all();
    }


    /**
     * Retrieve a User instance from users database table by its id.
     * @param $user_id
     * @return Collection
     */
    public function getUserById($user_id)
    {
        return User::findOrFail($user_id);
    }

}
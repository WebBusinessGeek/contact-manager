<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:55 PM
 */

namespace App\MyStuff\ContactAccount;


class ContactAccountRepository {

    /**Returns all contactAccounts associated with a given User.
     * @param $user_id
     * @return mixed
     */
    public function getAllContactAccountsRelatedToUser($user_id)
    {
        $accounts = ContactAccount::where('user_id', '=', $user_id)->get();

        return $accounts;
    }
}
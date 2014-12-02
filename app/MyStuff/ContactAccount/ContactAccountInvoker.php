<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:55 PM
 */

namespace App\MyStuff\ContactAccount;


class ContactAccountInvoker {


    /**Adds a nickname to the passed in ContactAccount instance.
     * @param ContactAccount $contactAccount
     * @param $name
     * @return ContactAccount
     */
    public function addNicknameToContactAccount(ContactAccount $contactAccount, $name)
    {
        $contactAccount->nickname = $name;

        return $contactAccount;
    }

    public function deleteContactAccount(ContactAccount $contactAccount)
    {
        $contactAccount->delete();
        return 'Deleted';
    }

}
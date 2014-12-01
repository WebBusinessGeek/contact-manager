<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:55 PM
 */

namespace App\MyStuff\ContactAccount;


class ContactAccountInvoker {


    /**Adds a nickname attribute to the passed in ContactAccount resource.
     * @param ContactAccount $contactAccount
     * @param $name
     */
    public function addNicknameToContactAccount(ContactAccount $contactAccount, $name)
    {
        $contactAccount->nickname = $name;
    }

}
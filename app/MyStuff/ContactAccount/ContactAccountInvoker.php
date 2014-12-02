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

    /**Deletes a contactAccount instance from the database.
     * @param ContactAccount $contactAccount
     * @return string
     * @throws \Exception
     */
    public function deleteContactAccount(ContactAccount $contactAccount)
    {
        $contactAccount->delete();
        return 'Deleted';
    }


    /**Changes a ContactAccount instance's nickname.
     * @param ContactAccount $contactAccount
     * @param $newNickname
     * @return ContactAccount
     */
    public function changeContactAccountNickname(ContactAccount $contactAccount, $newNickname)
    {
        $contactAccount->nickname = $newNickname;
        return $contactAccount;
    }

}
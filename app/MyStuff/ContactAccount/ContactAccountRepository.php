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

    /**Stores a contactAccount resource in the contactAccounts database table.
     * @param $user_id
     * @param ContactAccount $contactAccount
     */
    public function storeContactAccount($user_id, ContactAccount $contactAccount)
    {
        $contactAccount->user_id = $user_id;

        $contactAccount->save();
    }


    /**Retrieves a contactAccount from the contactAccounts database table by its nickname and user_id.
     * @param $user_id
     * @param $nickname
     * @return mixed
     */
    public function getContactAccountByNickname($user_id, $nickname)
    {
        return ContactAccount::where('user_id', '=', $user_id)->where('nickname', '=', $nickname)->first();
    }


    /**Retrieves a ContactAccount by id from the contactAccounts database table.
     * @param $account_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getContactAccountById($account_id)
    {
        return ContactAccount::findOrFail($account_id);
    }


    /**Quickly saves a contactAccount to the contactAccounts database table.
     * @param ContactAccount $contactAccount
     * @return string
     */
    public function softSave(ContactAccount $contactAccount)
    {
        $contactAccount->save();
        return 'Updated';
    }

}
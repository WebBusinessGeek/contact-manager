<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:47 AM
 */

namespace App\MyStuff\ContactDirectory;


use Illuminate\Database\DatabaseManager as DB;

class ContactRepository {


    /**Returns all contacts in an account in an array
     * @param $account_id
     * @return mixed
     */
    public function getAllContactsInAccount($account_id)
    {
        $contacts = Contact::where('contactAccount_id', '=', $account_id)->get();

        return $contacts;
    }


    /**Saves a contact resource to the contacts database table with the account_id specified
     * @param $account_id
     * @param Contact $contact
     */
    public function storeContactInAccount($account_id, Contact $contact)
    {
        $contact->contactAccount_id = $account_id;

        $contact->save();
    }

    /**Retrieves the first matching row from the contacts database table by its name and account_id
     * @param $account_id
     * @param $name
     * @return mixed
     */
    public function getContactByName($account_id, $name)
    {
        $contact = Contact::where('contactAccount_id', '=', $account_id)->where('name', '=', $name)->first();

        return $contact;
    }

    /**Retrieves first matching row from contacts table by its id, otherwise MethodNotFoundException is thrown
     * @param $id
     * @return \Illuminate\Support\Collection|static
     */
    public function getContactById($id)
    {
        $contact = Contact::findOrFail($id);

        return $contact;
    }

    /**Stores resource in the contacts database table
     * @param Contact $contact
     */
    public function softSave(Contact $contact)
    {
        $contact->save();
    }

}
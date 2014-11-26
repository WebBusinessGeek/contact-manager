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


    public function getAllContactsInAccount($account_id)
    {
        $contacts = Contact::where('contactAccount_id', '=', $account_id)->get();

        return $contacts;
    }


    public function getSpecificContactInAccount($account_id, $contact_id)
    {

    }

    public function storeContactInAccount($account_id, Contact $contact)
    {
        $contact->contactAccount_id = $account_id;

        $contact->save();
    }

    public function getContactByName($account_id, $name)
    {
        $contact = Contact::where('contactAccount_id', '=', $account_id)->where('name', '=', $name)->first();

        return $contact;
    }

    public function getContactById($id)
    {
        
    }

}
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

    }

}
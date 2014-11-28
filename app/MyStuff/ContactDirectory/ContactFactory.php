<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:47 AM
 */

namespace App\MyStuff\ContactDirectory;


class ContactFactory {

    /**Creates a new instance of the Contact class
     * @return Contact
     */
    public function createNewContact()
    {
        return new Contact();
    }
}
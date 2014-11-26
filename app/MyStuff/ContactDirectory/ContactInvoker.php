<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:47 AM
 */

namespace App\MyStuff\ContactDirectory;


class ContactInvoker {

    /**
     * Add passed in attributes to instance of Contact class
     * @param Contact $contact
     * @param $name
     * @param $email
     * @param $phoneNumber
     * @param $industry
     * @param $role
     * @param $contactRelation
     * @param null $company
     * @param null $title
     * @param null $website
     * @return Contact
     */
    public function addAttributesToContact(Contact $contact,  $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company=null, $title=null, $website=null)
    {
        $attributes = [
            'name' => $name,
            'email'=> $email,
            'phone_number' => $phoneNumber,
            'industry' => $industry,
            'role' => $role,
            'contactRelation' => $contactRelation,
            'company' => $company,
            'title' => $title,
            'website' => $website ];

        foreach($attributes as $attributeKey => $attributeValue)
        {
            ($attributeValue == null) ? :  $contact->$attributeKey = $attributeValue;
        }
        return $contact;
    }
}
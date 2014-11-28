<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:47 AM
 */

namespace App\MyStuff\ContactDirectory;


class ContactInvoker {

    /**Adds the passed in attributes to an instance of Contact class
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


    /**Flattens array and then as the values as attributes to an instance of the Contact class
     * @param Contact $contact
     * @param $newAttributes
     * @return Contact
     */
    public function updateContact(Contact $contact, $newAttributes)
    {
        $flatArray = array_values($newAttributes);

        return $this->addAttributesToContact($contact, $flatArray[0], $flatArray[1], $flatArray[2], $flatArray[3],
                $flatArray[4], $flatArray[5], $flatArray[6], $flatArray[7], $flatArray[8]);
    }

    /**Removes specified row/resource from the contacts database table
     * @param Contact $contact
     * @return string
     * @throws \Exception
     */
    public function deleteContact(Contact $contact)
    {
        $contact->delete();
        return 'Deleted';
    }
}
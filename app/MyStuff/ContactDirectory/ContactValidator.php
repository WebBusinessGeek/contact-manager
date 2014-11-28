<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:46 AM
 */

namespace App\MyStuff\ContactDirectory;


use App\MyStuff\Polymorphic\ValidatorTrait;


class ContactValidator {

    use ValidatorTrait;

    /**Allowed attributes of Contact class database schema
     * @var array
     */
    public $allowedAttributes = [
        'name',
        'email',
        'phone_number',
        'industry',
        'role',
        'contactRelation',
        'company',
        'title',
        'website'
    ];

    /**Returns true if all values passed could be valid attribute values, otherwise false
     * @param $emailToCheck
     * @param $phoneNumberToCheck
     * @param null $urlToCheck
     * @return bool
     */
    public function isValidAll( $emailToCheck, $phoneNumberToCheck, $urlToCheck = null)
    {
       return (isset($urlToCheck))
            ? $this->isValidNumberEmailAndUrl($emailToCheck, $phoneNumberToCheck, $urlToCheck)
            : $this->isValidNumberAndEmail($emailToCheck, $phoneNumberToCheck);
    }


    /**Returns true if attribute array (keys and values) are valid, otherwise false
     * @param array $newAttributes
     * @return bool
     */
    public function isValidAttributes($newAttributes = array())
    {

        foreach($this->allowedAttributes as $attribute)
        {
            if(array_key_exists($attribute, $newAttributes) == false)
            {
                return false;
            }
        }

        for($i = 0; $i <= 5; $i++)
        {
            if(isset($newAttributes[$this->allowedAttributes[$i]]) == false || $newAttributes[$this->allowedAttributes[$i]] == null)
            {
                return false;
            }
        }

        return true;
    }


    /**Returns true if instance passed in is instance of the Contact class, otherwise returns false
     * @param $possibleContact
     * @return bool
     */
    public function isContactInstance($possibleContact)
    {
        return (gettype($possibleContact) == 'object' && get_class($possibleContact) == 'App\MyStuff\ContactDirectory\Contact');
    }
}
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

    public function isValidAll( $emailToCheck, $phoneNumberToCheck, $urlToCheck = null)
    {
       return (isset($urlToCheck))
            ? $this->isValidNumberEmailAndUrl($emailToCheck, $phoneNumberToCheck, $urlToCheck)
            : $this->isValidNumberAndEmail($emailToCheck, $phoneNumberToCheck);
    }


    
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


}
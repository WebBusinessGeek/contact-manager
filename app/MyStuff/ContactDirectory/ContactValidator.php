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

    public function isValidAll( $emailToCheck, $phoneNumberToCheck, $urlToCheck = null)
    {
       return (isset($urlToCheck))
            ? $this->isValidNumberEmailAndUrl($emailToCheck, $phoneNumberToCheck, $urlToCheck)
            : $this->isValidNumberAndEmail($emailToCheck, $phoneNumberToCheck);
    }
//$this->validator->isValidAttributes($newAttributes)  WORKING
    public function isValidAttributes($newAttributes = array())
    {

        //make sure all attribute keys are present

        //make sure UNnullable attributes are not null

        
    }


}
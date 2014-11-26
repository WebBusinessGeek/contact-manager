<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 11:22 PM
 */

namespace App\MyStuff\Polymorphic;


use Psr\Log\InvalidArgumentException;

trait ValidatorTrait {

    /**
     * Checks if key exists in a property array on an object
     * @param $classInstance
     * @param $propertyToCheck
     * @param $key
     * @return bool
     */
    public function keyExistsInPropertyArray($classInstance, $propertyToCheck, $key)
    {
        return array_key_exists($key, $classInstance->$propertyToCheck);
    }


    public function checkIfKeyIsGreaterThanZero($key)
    {
        if($key < 1)
        {
            throw new InvalidArgumentException('Key must be greater than zero');
        }
        return true;
    }

    public function isValidEmailFormat($emailToCheck)
    {
        return (filter_var($emailToCheck, FILTER_VALIDATE_EMAIL))? true : false ;
    }

    public function isValidPhoneNumberFormat($phoneNumberToCheck)
    {
        $acceptedformats = [
            "/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i", // [1-]555-555-5555
            "/^([1]-)?[0-9]{3}.[0-9]{3}.[0-9]{4}$/i", // [1-]555.555.5555
            "/^([1]-)?\([0-9]{3}\)-[0-9]{3}-[0-9]{4}$/i" // [1-](555)-555-5555

        ];

        $responses = [];
        foreach($acceptedformats as $format)
        {
          if(preg_match($format, $phoneNumberToCheck))
          {
             return true;
          }
        }
        return false;
    }


    public function isValidURLFormat($urlToCheck)
    {
        return (filter_var($urlToCheck, FILTER_VALIDATE_URL))? true : false ;
    }


    public function isValidNumberAndEmail($emailToCheck, $phoneNumberToCheck)
    {
        return ($this->isValidEmailFormat($emailToCheck) == true
            && $this->isValidPhoneNumberFormat($phoneNumberToCheck) == true);
    }

    public function isValidNumberEmailAndUrl($emailToCheck, $phoneNumberToCheck, $urlToCheck)
    {
        return ($this->isValidNumberAndEmail($emailToCheck, $phoneNumberToCheck)
            && $this->isValidURLFormat($urlToCheck) == true);
    }


}
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

    public function isValidPhoneNumberFormat()
    {

    }

    public function isValidURLFormat()
    {

    }

}
<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 11:22 PM
 */

namespace App\MyStuff\Polymorphic;


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

}
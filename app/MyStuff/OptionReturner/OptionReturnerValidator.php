<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:04 PM
 */

namespace App\MyStuff\OptionReturner;


use App\MyStuff\Polymorphic\ValidatorTrait;
use Psr\Log\InvalidArgumentException;

class OptionReturnerValidator {

    use ValidatorTrait;

    public $allowedProperties = [

        'roles',

        'industries',

        'contactRelations'
    ];


    public function getAllowedProperty($propertyKey)
    {
        if(!$this->isInAllowedProperties($propertyKey))
        {
            throw new InvalidArgumentException('Property does not exist');
        }
        return $this->allowedProperties[--$propertyKey];
    }

    public function checkKeyForRolesProperty(OptionReturner $optionReturner, $key)
    {
        return $this->keyExistsInPropertyArray($optionReturner, $this->getAllowedProperty(1), $key);
    }

    public function checkKeyForIndustriesProperty(OptionReturner $optionReturner, $key)
    {
        return $this->keyExistsInPropertyArray($optionReturner, $this->getAllowedProperty(2), $key);
    }

    public function isInAllowedProperties($propertyKey)
    {
        return (array_key_exists($propertyKey, $this->allowedProperties));
    }
}
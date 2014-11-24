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

    /**
     * Reference for the current properties on the OptionReturner class
     * @var array
     */
    public $allowedProperties = [

        'roles',

        'industries',

        'contactRelations'
    ];

    /**
     * Checks if key passed in is available in the properties on the OptionReturner class
     * @param $propertyKey
     * @return bool
     */
    public function isInAllowedProperties($propertyKey)
    {
        return (array_key_exists($propertyKey, $this->allowedProperties));
    }


    /**
     * Gets the correct property referenced in the argument (key) or throws an error
     * @param $propertyKey
     * @return mixed
     */
    public function getAllowedProperty($propertyKey)
    {
        $check = $propertyKey - 1;

        if(!$this->isInAllowedProperties($check))
        {
            throw new InvalidArgumentException('Property does not exist');
        }
        return $this->allowedProperties[--$propertyKey];
    }

    /**
     * Checks if the passed in key is present on the 'roles' property of the OptionReturner class
     * @param OptionReturner $optionReturner
     * @param $key
     * @return bool
     */
    public function checkRolesPropertyForKey(OptionReturner $optionReturner, $key)
    {
        return $this->keyExistsInPropertyArray($optionReturner, $this->getAllowedProperty(1), $key);
    }

    /**
     * Checks if the passed in key is present on the 'industries' property of the OptionReturner class
     * @param OptionReturner $optionReturner
     * @param $key
     * @return bool
     */
    public function checkIndustriesPropertyForKey(OptionReturner $optionReturner, $key)
    {
        return $this->keyExistsInPropertyArray($optionReturner, $this->getAllowedProperty(2), $key);
    }

    /**
     * Checks if the passed in key is present on the 'contactRelations' property of the OptionReturner class
     * @param OptionReturner $optionReturner
     * @param $key
     * @return bool
     */
    public function checkContactRelationsPropertyForKey(OptionReturner $optionReturner, $key)
    {
        return $this->keyExistsInPropertyArray($optionReturner, $this->getAllowedProperty(3), $key);
    }



}
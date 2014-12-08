<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:36 PM
 */

namespace App\MyStuff\UserDirectory;


use App\MyStuff\Polymorphic\ValidatorTrait;

class UserValidator {

    public $allowedAttributes = [
        'email' => null
    ];

    use ValidatorTrait;

    /**
     * Returns true if email and password passed in are valid, otherwise false.
     * @param $emailToCheck
     * @param $passwordToCheck
     * @return bool
     */
    public function isValidEmailAndPassword($emailToCheck, $passwordToCheck)
    {
        return ($this->isValidEmailFormat($emailToCheck) && $this->isValidPassword($passwordToCheck));
    }


    /**
     * Returns true is passed in argument is a instance of App\User, otherwise returns false.
     * @param $possibleUser
     * @return bool
     */
    public function isUserInstance($possibleUser)
    {
        return (is_object($possibleUser) && get_class($possibleUser) == 'App\User');
    }


    /**
     * Returns true is attribute values passed in are usable in the system.
     * @param array $newAttributes
     * @return bool
     */
    public function isValidAttributes($newAttributes = array())
    {
        return($this->matchesArrayLength($newAttributes, $this->allowedAttributes) &&
                $this->matchesArrayKeys($newAttributes, $this->allowedAttributes) &&
                $this->isValidFormatLooper($newAttributes));

    }

    /**
     * Returns true if each value is formatted properly as referenced by its key's formatting counterpart (i.e isValidEmailFormat()), otherwise false.
     * @param array $attributesToCheck
     * @return bool
     */
    public function isValidFormatLooper($attributesToCheck = array())
    {
        $responses = [];
        foreach($attributesToCheck as $key => $value)
        {
            $method = 'isValid'.ucfirst($key).'Format';
            array_push($responses, $this->$method($value));
        }
        return (in_array(false, $responses))? false: true;
    }













}
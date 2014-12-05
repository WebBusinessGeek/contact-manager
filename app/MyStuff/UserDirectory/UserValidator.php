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
        'email'
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



    public function isValidAttributes($newAttributes = array())
    {
        /*

        check if newAttribute length is same length as allowed attributes
        $this->matchesArrayLength($newAttributes, $this->allowedAttributes)  - DONE

        check if newAttribute keys contains all allowedAttributes keys - make this extensible


        check if newAttribute values are in valid format - make this extensible
         * */


    }

   








}
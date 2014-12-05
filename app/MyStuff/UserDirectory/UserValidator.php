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




}
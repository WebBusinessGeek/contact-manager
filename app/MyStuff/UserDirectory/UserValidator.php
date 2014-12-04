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

    public function isValidEmailAndPassword($emailToCheck, $passwordToCheck)
    {
//        return ($this->isValidEmailFormat($emailToCheck) && $this->isValidPassword($passwordToCheck));
    }




}
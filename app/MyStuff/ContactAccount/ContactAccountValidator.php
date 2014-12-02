<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:55 PM
 */

namespace App\MyStuff\ContactAccount;


use App\MyStuff\Polymorphic\ValidatorTrait;

class ContactAccountValidator {

    use ValidatorTrait;

    /**Returns a boolean value after checking if passed in argument is an instance of the ContactAccount class.
     * @param $possibleAccount
     * @return bool
     */
    public function isAContactAccount($possibleAccount)
    {
        return (is_object($possibleAccount) && get_class($possibleAccount) == 'App\MyStuff\ContactAccount\ContactAccount') ? :false;
    }


}
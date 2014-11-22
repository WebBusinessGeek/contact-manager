<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:04 PM
 */

namespace App\MyStuff\Polymorphic;


class OptionReturnerFactory {


    /**
     * Returns a new OptionReturner instance
     * @return OptionReturner
     */
    public function createNewOptionReturner()
    {
        return new OptionReturner();
    }

}
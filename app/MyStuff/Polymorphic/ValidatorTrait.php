<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 11:22 PM
 */

namespace App\MyStuff\Polymorphic;


trait ValidatorTrait {

    public function keyExistsInPropertyArray($class, $property, $key)
    {
        return array_key_exists($key, $class->$property);
    }

}
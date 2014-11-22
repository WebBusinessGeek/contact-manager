<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:04 PM
 */

namespace App\MyStuff\OptionReturner;


use App\MyStuff\Polymorphic\ValidatorTrait;

class OptionReturnerValidator {

    use ValidatorTrait;

    public $allowedProperties = [

        'roles',

        'industries',

        'contactRelations'
    ];

   //check if argument passed is roles, industries, or contactRelations

}
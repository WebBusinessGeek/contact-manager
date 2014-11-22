<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:04 PM
 */

namespace App\MyStuff\OptionReturner;


class OptionReturnerInvoker {

    //call getAllRoles on a OptionReturner resource
    public function getAllRoles(OptionReturner $optionReturner)
    {
        return $optionReturner->roles;
    }

    //call getSpecificRole on a OptionReturner resource (argument)
    public function getSpecificRole(OptionReturner $optionReturner, $key)
    {
        return $optionReturner->roles[--$key];
    }

    //call getAllIndustries on a OptionReturner resource
    public function getAllIndustries(OptionReturner $optionReturner)
    {
        return $optionReturner->industries;
    }

    //call getSpecificIndustry on a OptionReturner resource
    public function getSpecificIndustry(OptionReturner $optionReturner, $key)
    {
        return $optionReturner->industries[--$key];
    }

    //call getAllRelations on a OptionReturner resource
    public function getAllContactRelations(OptionReturner $optionReturner)
    {
        return $optionReturner->contactRelations;
    }

    //call getSpecificRelations on a OptionReturner resource
    public function getSpecificContactRelation(OptionReturner $optionReturner, $key)
    {
        return $optionReturner->contactRelations[--$key];
    }
}
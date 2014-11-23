<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:04 PM
 */

namespace App\MyStuff\OptionReturner;


class OptionReturnerInvoker {


    /**
     * Returns all values stored in Roles property on a OptionReturner resource
     * @param OptionReturner $optionReturner
     * @return array
     */
    public function getAllRoles(OptionReturner $optionReturner)
    {
        return $optionReturner->roles;
    }


    /**
     * Returns a specific value stored in Roles property on a OptionReturner resource
     * @param OptionReturner $optionReturner
     * @param $key
     * @return mixed
     */
    public function getSpecificRole(OptionReturner $optionReturner, $key)
    {
        return $optionReturner->roles[--$key];
    }


    /**
     * Returns all values stored in Industries property on a OptionReturner resource
     * @param OptionReturner $optionReturner
     * @return array
     */
    public function getAllIndustries(OptionReturner $optionReturner)
    {
        return $optionReturner->industries;
    }


    /**
     * Returns a specific value stored in the Industries property on a OptionReturner resource
     * @param OptionReturner $optionReturner
     * @param $key
     * @return mixed
     */
    public function getSpecificIndustry(OptionReturner $optionReturner, $key)
    {
        return $optionReturner->industries[--$key];
    }


    /**
     * Returns all values stored in the contactRelations property on a OptionReturner resource
     * @param OptionReturner $optionReturner
     * @return array
     */
    public function getAllContactRelations(OptionReturner $optionReturner)
    {
        return $optionReturner->contactRelations;
    }


    /**
     * Returns a specific value stored in the contactRelations property on a OptionReturner resource
     * @param OptionReturner $optionReturner
     * @param $key
     * @return mixed
     */
    public function getSpecificContactRelation(OptionReturner $optionReturner, $key)
    {
        return $optionReturner->contactRelations[--$key];
    }
}
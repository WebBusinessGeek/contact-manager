<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/24/14
 * Time: 6:13 PM
 */

namespace App\MyStuff\OptionReturner;


interface OptionReturnerInternalServiceInterface {

    public function getEverything();

    public function getAllRoles();

    public function getSpecificRole($key);

    public function getAllIndustries();

    public function getSpecificIndustry($key);

    public function getAllContactRelations();

    public function getSpecificContactRelation($key);

}
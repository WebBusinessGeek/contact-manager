<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:03 PM
 */

namespace App\MyStuff\OptionReturner;


class OptionReturnerInternalService {

    /**
     * The commandController for clean calls to the underlying classes
     * @var OptionReturnerCommandController
     */
    public $commandController;

    /**
     * The options available on the OptionReturner class
     * @var array
     */
    public $options = [

        'Roles',

        'Industries',

        'ContactRelations'
    ];


    function __construct()
    {
        $this->commandController = new OptionReturnerCommandController();
    }

    /**
     * Get all options on OptionReturner class
     * @return array [multidimensional]
     */
    public function getEverything()
    {
        $everything = [];

        for($i = 0; $i < count($this->options); $i++)
        {
            $methodToCall = 'getAll'.$this->options[$i];
            $everything[] = $this->commandController->$methodToCall();
        }

        return $everything;
    }

    /**
     * Return all roles on OptionReturner class
     * @return mixed
     */
    public function getAllRoles()
    {
       return $this->commandController->getAllRoles();
    }

    /**
     * Return specific role on OptionReturner class or throw an error
     * @param $key
     * @return mixed|void
     */
    public function getSpecificRole($key)
    {
       return $this->commandController->getSpecificRole($key);
    }

    /**
     * Return all industries on OptionReturner class
     * @return array
     */
    public function getAllIndustries()
    {
        return $this->commandController->getAllIndustries();
    }

    /**
     * Return specific industry on OptionReturner class or throw an error
     * @param $key
     * @return mixed|void
     */
    public function getSpecificIndustry($key)
    {
        return $this->commandController->getSpecificIndustry($key);
    }

    /**
     * Return all contactRelations on OptionReturner class
     * @return array
     */
    public function getAllContactRelations()
    {
        return $this->commandController->getAllContactRelations();
    }

    /**
     * Return specific contactRelation on OptionReturner class or throw an error
     * @param $key
     * @return mixed|void
     */
    public function getSpecificContactRelation($key)
    {
        return $this->commandController->getSpecificContactRelation($key);
    }



}
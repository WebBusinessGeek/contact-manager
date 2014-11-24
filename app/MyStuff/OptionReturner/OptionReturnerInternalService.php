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





}
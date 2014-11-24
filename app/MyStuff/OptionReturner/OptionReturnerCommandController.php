<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:04 PM
 */

namespace App\MyStuff\OptionReturner;


use Psr\Log\InvalidArgumentException;

class OptionReturnerCommandController {

    public $factory;

    public $invoker;

    public $validator;

    public $responder;

    function __construct()
    {
        $this->invoker = new OptionReturnerInvoker();
        $this->validator = new OptionReturnerValidator();
        $this->responder = new OptionReturnerResponder();
        $this->factory = new OptionReturnerFactory();
    }


    /**
     * Get all roles available on the OptionReturner class
     * @return mixed
     */
    public function getAllRoles()
    {
       return $this->invoker->getAllRoles($this->factory->createNewOptionReturner());

    }

    //return specific roles
        //validator - checkRolesPropertyForKey
        //factory - get resource
        //invoker - call for retrieval (argument) => key
    public function getSpecificRole($key)
    {
        $optionReturner = $this->factory->createNewOptionReturner();

        return ($this->validator->checkRolesPropertyForKey($optionReturner, $key))
            ? $this->invoker->getSpecificRole($optionReturner, $key)
            : $this->responder->throwBadKeyException();

    }

    //return all industries
        //factory - get resource
        //invoker - call for retrieval

    //return specific industry
        //validator - checkRolesPropertyForKey
        //factory - get resource
        //invoker - call for retrieval (argument) => key

    //return all contact relations
        //factory - get resource
        //invoker - call for retrieval

    //return specific contact relation
        //validator - checkRolesPropertyForKey
        //factory - get resource
        //invoker - call for retrieval (argument) => key

}
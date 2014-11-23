<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:04 PM
 */

namespace App\MyStuff\OptionReturner;


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


    //return all roles
        //factory - get resource
        //invoker - call for retrieval
    public function getAllRoles()
    {
       return $this->invoker->getAllRoles($this->factory->createNewOptionReturner());

    }

    //return specific roles
        //validator - checkRolesPropertyForKey
        //factory - get resource
        //invoker - call for retrieval (argument) => key

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
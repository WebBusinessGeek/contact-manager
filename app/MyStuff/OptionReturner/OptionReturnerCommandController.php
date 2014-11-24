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


    /**
     * Returns a specific role from the OptionReturner class or throws an InvalidArgumentException error
     * @param $key
     * @return mixed|void
     */
    public function getSpecificRole($key)
    {
        $validator = $this->validator->checkIfKeyIsGreaterThanZero($key);

        if($validator != true)
        {
            return $validator;
        }

        $optionReturner = $this->factory->createNewOptionReturner();

        return ($this->validator->checkRolesPropertyForKey($optionReturner, $key))
            ? $this->invoker->getSpecificRole($optionReturner, $key)
            : $this->responder->throwBadKeyException();

    }

    /**
     * Get all industries from the OptionReturner class
     * @return array
     */
    public function getAllIndustries()
    {
        return $this->invoker->getAllIndustries($this->factory->createNewOptionReturner());
    }

    /**
     * Returns a specific industry from the OptionReturner class or throws an InvalidArgumentException error
     * @param $key
     * @return mixed|void
     */
    public function getSpecificIndustry($key)
    {
        $validator = $this->validator->checkIfKeyIsGreaterThanZero($key);

        if($validator != true)
        {
            return $validator;
        }

        $optionReturner = $this->factory->createNewOptionReturner();

        return ($this->validator->checkIndustriesPropertyForKey($optionReturner, $key))
            ? $this->invoker->getSpecificIndustry($optionReturner, $key)
            : $this->responder->throwBadKeyException();

    }

    /**
     * Get all contactRelations from the OptionReturner class
     * @return array
     */
    public function getAllContactRelations()
    {
        return $this->invoker->getAllContactRelations($this->factory->createNewOptionReturner());
    }

    /**
     * Returns a specific contactRelation from the OptionReturner class or throws an InvalidArgumentException error
     * @param $key
     * @return mixed|void
     */
    public function getSpecificContactRelation($key)
    {
        $validator = $this->validator->checkIfKeyIsGreaterThanZero($key);

        if($validator != true)
        {
            return $validator;
        }

        $optionReturner = $this->factory->createNewOptionReturner();

        return ($this->validator->checkContactRelationsPropertyForKey($optionReturner, $key))
            ? $this->invoker->getSpecificContactRelation($optionReturner, $key)
            : $this->responder->throwBadKeyException();

    }

}
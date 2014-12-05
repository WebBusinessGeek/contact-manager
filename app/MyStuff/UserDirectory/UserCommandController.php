<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:38 PM
 */

namespace App\MyStuff\UserDirectory;


class UserCommandController {

    public $validator;

    public $factory;

    public $invoker;

    public $repository;

    public $responder;

    function __construct()
    {
        $this->validator = new UserValidator();
        $this->factory = new UserFactory();
        $this->invoker = new UserInvoker();
        $this->repository = new UserRepository();
        $this->responder = new UserResponder();
    }


    public function index()
    {
        /*



         * */
    }

    /**
     * If valid email and password function creates & stores a User instance in the users database table, otherwise returns an error message.
     * @param $email
     * @param $password
     * @return mixed
     */
    public function store($email, $password)
    {
        if ($this->validator->isValidEmailAndPassword($email, $password))
        {
            $this->repository->
            saveUser($this->invoker->addEmailAndPasswordToUser($this->factory->createNewUser(),$email, $password));

            return $this->responder->sendMessage('Stored new user');
        }
        return $this->responder->sendMessage('Invalid Email or Password format');
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function login()
    {

    }

    public function logout()
    {

    }



}
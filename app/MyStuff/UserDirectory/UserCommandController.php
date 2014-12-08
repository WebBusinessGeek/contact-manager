<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:38 PM
 */

namespace App\MyStuff\UserDirectory;


use Illuminate\Database\Eloquent\ModelNotFoundException;

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


    /**
     * Retrieves all User instances from users database table.
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return $this->repository->getAllUsers();
    }


    /**
     * If valid email and password, function creates & stores a User instance in the users database table, otherwise returns an error message.
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

    /**
     * If $user_id exists, method will retrieve a User Instance from the users table by its id, otherwise sends an error message.
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function show($user_id)
    {
        try
        {
            return $this->repository->getUserById($user_id);
        }
        catch(ModelNotFoundException $e)
        {
            return $this->responder->sendMessage('No user by that id');
        }
    }

    /**
     * Updates a user if instance exists and attributes passed in are valid, otherwise sends an error message. 
     * @param $user_id
     * @param array $newAttributes
     * @return mixed
     */
    public function update($user_id, $newAttributes = array())
    {
        $user = $this->show($user_id);

        if($this->validator->isUserInstance($user) && $this->validator->isValidAttributes($newAttributes))
        {
            $this->repository->saveUser($this->invoker->addNewAttributesToUser($user, $newAttributes));
            return $this->responder->sendMessage('Updated');
        }
        return $this->responder->sendMessage('User unidentified or Invalid attributes supplied.');
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
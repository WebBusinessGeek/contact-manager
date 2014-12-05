<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:38 PM
 */

namespace App\MyStuff\UserDirectory;


class UserCommandController {



    public function index()
    {
        /*



         * */
    }

    public function store($email, $password)
    {
        /*

        check attributes for validation (email, password?)
        $this->validator->isValidEmailAndPassword() - DONE
            - If valid
                - create a new user instance
                $this->factory->createNewUser() - DONE
                - add necessary attributes to instance
                $this->invoker->addEmailAndPasswordToUser() - DONE
                - store it in database
                $this->repository->saveUser() -
                - return stored feedback
                $this->responder->sendMessage('stored') - DONE
            - If invalid
                - return error message
                $this->responder->sendMessage('Invalid Email or Password format') - DONE
         * */
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
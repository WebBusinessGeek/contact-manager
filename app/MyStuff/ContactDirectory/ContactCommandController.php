<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:47 AM
 */

namespace App\MyStuff\ContactDirectory;


class ContactCommandController {


    public $repository;

    public $responder;

    public $validator;

    public $factory;


    function __construct()
    {
        $this->repository = new ContactRepository();

        $this->responder = new ContactResponder();

        $this->factory = new ContactFactory();

        $this->validator = new ContactValidator();

    }


    public function index($account_id)
    {
        $contacts = $this->repository->getAllContactsInAccount($account_id);

        return (count($contacts) < 1) ? $this->responder->sendMessage('No contacts') : $contacts;
    }

    public function store($account_id, $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company =null, $title = null, $website = null)
    {
        //$this->validator->isValidAll($email, $url, $phoneNumber)
                //if yes
                    //$contact = $this->factory->createNewContact(); DONE
                    //$this->invoker->addAttributesToContact($contact,  $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company, $title, $website)
                    //$this->repository->storeContactInAccount($account_id, $contact)
                    //$this->responder->sendMessage('Stored')
                //if no
                    //$this->responder->('Bad format for email, phone number, or url')
    }

    public function update()
    {

    }

    public function show()
    {

    }

    public function destroy()
    {

    }


}
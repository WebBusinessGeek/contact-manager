<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:47 AM
 */

namespace App\MyStuff\ContactDirectory;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

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

        $this->invoker = new ContactInvoker();

    }


    public function index($account_id)
    {
        $contacts = $this->repository->getAllContactsInAccount($account_id);

        return (count($contacts) < 1) ? $this->responder->sendMessage('No contacts') : $contacts;
    }



    public function store($account_id, $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company =null, $title = null, $website = null)
    {
       if ($this->validator->isValidAll($email, $phoneNumber, $website) == true)
       {
           $contact = $this->factory->createNewContact();

           $this->invoker->addAttributesToContact($contact,  $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company, $title, $website);

           $this->repository->storeContactInAccount($account_id, $contact);

           return $this->responder->sendMessage('Stored');
       }
        return $this->responder->sendMessage('Bad format for email, phone number, or url');
    }



    public function show($id)
    {
        try
        {
            $contact = $this->repository->getContactById($id);
            return $contact;
        }
        catch(ModelNotFoundException $e)
        {
            return $this->responder->sendMessage('No contact by that id');
        }

    }

    public function update()
    {

    }

    public function destroy()
    {

    }


}
<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:56 PM
 */

namespace App\MyStuff\ContactAccount;


class ContactAccountCommandController {


    public $repository;

    public $responder;

    public $invoker;

    public $factory;


    function __construct()
    {
        $this->repository = new ContactAccountRepository();
        $this->responder = new ContactAccountResponder();
        $this->invoker = new ContactAccountInvoker();
        $this->factory = new ContactAccountFactory();

    }

    /**Returns all contactAccounts associated with a given user, otherwise a warning message.
     * @param $user_id
     * @return mixed
     */
    public function index($user_id)
    {
        $accounts = $this->repository->getAllContactAccountsRelatedToUser($user_id);

        return (count($accounts) < 1) ? $this->responder->sendMessage('No accounts associated with that user') : $accounts;
    }

    public function store($user_id, $name)
    {


//        $contact = $this->factory->createNewContactAccount();
//
//        $this->invoker->addNameToContactAccount($contact, $name);
//
//        $this->repository->storeContactAccount($user_id, $contact);
//
//        $this->responder->sendMessage('stored');


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

}
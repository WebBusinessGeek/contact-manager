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

    function __construct()
    {
        $this->repository = new ContactRepository();

        $this->responder = new ContactResponder();
    }


    public function index($account_id)
    {
        $contacts = $this->repository->getAllContactsInAccount($account_id);

        return (count($contacts) < 1) ? $this->responder->sendMessage('No contacts') : $contacts;

    }

    public function store()
    {

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
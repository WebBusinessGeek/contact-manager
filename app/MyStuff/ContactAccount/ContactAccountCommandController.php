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

    function __construct()
    {
        $this->repository = new ContactAccountRepository();
        $this->responder = new ContactAccountResponder();

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

    public function store()
    {

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
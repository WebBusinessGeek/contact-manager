<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:56 PM
 */

namespace App\MyStuff\ContactAccount;


use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactAccountCommandController {


    public $repository;

    public $responder;

    public $invoker;

    public $factory;

    public $validator;


    function __construct()
    {
        $this->repository = new ContactAccountRepository();
        $this->responder = new ContactAccountResponder();
        $this->invoker = new ContactAccountInvoker();
        $this->factory = new ContactAccountFactory();
        $this->validator = new ContactAccountValidator();

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


    /**Store a ContactAccount in the contactAccounts Database table.
     * @param $user_id
     * @param $name
     * @return mixed
     */
    public function store($user_id, $name)
    {
        $this->repository->storeContactAccount($user_id,
            $this->invoker->addNicknameToContactAccount($contact = $this->factory->createNewContactAccount(), $name));

        return $this->responder->sendMessage('stored');
    }


    /**Retrieves a specified ContactAccount from Database by id.
     * @param $account_id
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function show($account_id)
    {
      try
        {
            return $this->repository->getContactAccountById($account_id);
        }
        catch(ModelNotFoundException $e)
        {
            return $this->responder->sendMessage('No Contact Account by that id');
        }
    }

    public function update()
    {

    }

    /**Deletes a ContactAccount resource from the contactAccounts DB table.
     * @param $account_id
     * @return \Illuminate\Database\Eloquent\Collection|mixed|string
     */
    public function destroy($account_id)
    {
        $account = $this->show($account_id);

        return $this->validator->isAContactAccount($account)  ? $this->invoker->deleteContactAccount($account)  : $account;
    }

}
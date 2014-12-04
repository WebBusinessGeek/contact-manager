<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:56 PM
 */

namespace App\MyStuff\ContactAccount;


class ContactAccountInternalService implements ContactAccountInternalServiceInterface {

    public $commandController;

    function __construct()
    {
        $this->commandController = new ContactAccountCommandController();
    }


    /**Returns a collection of contactAccount resources associated with the user_id passed in, otherwise an error message.
     * @param $user_id
     * @return mixed
     */
    public function index($user_id)
    {
        return $this->commandController->index($user_id);
    }


    /**Creates and stores a new ContactAccount resource in the contactAccounts database table.
     * @param $user_id
     * @param $name
     * @return mixed
     */
    public function store($user_id, $name)
    {
        return $this->commandController->store($user_id, $name);
    }


    /**Retrieves a specified ContactAccount resource, otherwise returns an error message.
     * @param $account_id
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function show($account_id)
    {
        return $this->commandController->show($account_id);
    }


    /**Updates a ContactAccounts nickname if contactAccount instance exists in database table, otherwise returns an error message.
     * @param $account_id
     * @param $newNickname
     * @return \Illuminate\Database\Eloquent\Collection|mixed|string
     */
    public function update($account_id, $newNickname)
    {
        return $this->commandController->update($account_id, $newNickname);
    }

    
    public function destroy($account_id)
    {

    }


}
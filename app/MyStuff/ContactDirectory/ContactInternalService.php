<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:48 AM
 */

namespace App\MyStuff\ContactDirectory;


class ContactInternalService implements ContactInternalServiceInterface{

    public $commandController;

    function __construct()
    {
        $this->commandController = new ContactCommandController();
    }

    /**Returns all contacts associated with specified account, otherwise 'No contacts' will be returned.
     * @param $account_id
     * @return mixed
     */
    public function index($account_id)
    {
        return $this->commandController->index($account_id);
    }


    /**Creates and stores a contact resource in the contacts database.
     * @param $account_id
     * @param $name
     * @param $email
     * @param $phoneNumber
     * @param $industry
     * @param $role
     * @param $contactRelation
     * @param null $company
     * @param null $title
     * @param null $website
     * @return mixed
     */
    public function store($account_id, $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company =null, $title = null, $website = null)
    {
        return $this->commandController->store($account_id,$name, $email, $phoneNumber, $industry, $role, $contactRelation, $company, $title, $website);
    }


    /**Retrieves specified contact resource from database.
     * @param $id
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function show($id)
    {
        return $this->commandController->show($id);
    }

    /**Update the specified contact or return an error message.
     * @param $id
     * @param array $newAttributes
     * @return mixed
     */
    public function update($id, $newAttributes = array())
    {
        return $this->commandController->update($id, $newAttributes);
    }


    /**Delete the specified contact from the database, otherwise return a message.
     * @param $id
     * @return \Illuminate\Support\Collection|mixed|string|static
     */
    public function destroy($id)
    {
        return $this->commandController->destroy($id);
    }


}
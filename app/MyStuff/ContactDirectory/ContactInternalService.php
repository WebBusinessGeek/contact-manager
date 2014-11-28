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


    
    public function store($account_id, $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company =null, $title = null, $website = null)
    {

    }

    public function show($id)
    {

    }

    public function update($id, $newAttributes = array())
    {

    }

    public function destroy($id)
    {

    }


}
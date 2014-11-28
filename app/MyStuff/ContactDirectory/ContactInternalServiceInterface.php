<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:48 AM
 */

namespace App\MyStuff\ContactDirectory;


interface ContactInternalServiceInterface {

    public function index($account_id);

    public function store($account_id, $name, $email, $phoneNumber, $industry, $role, $contactRelation, $company =null, $title = null, $website = null);

    public function show($id);

    public function update($id, $newAttributes = array());

    public function destroy($id);

}
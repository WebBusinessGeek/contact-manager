<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 11:48 AM
 */

namespace App\MyStuff\ContactDirectory;


class ContactInternalService {

    public $commandController;

    function __construct()
    {
        $this->commandController = new ContactCommandController();
    }

    public function index()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }


}
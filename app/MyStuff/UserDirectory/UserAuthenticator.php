<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/8/14
 * Time: 1:27 PM
 */

namespace App\MyStuff\UserDirectory;


use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Guard;

class UserAuthenticator extends AuthController{

    public $auth;

    public function __construct()
    {
        $app = Application::getInstance();
        $this->auth = $app->make('App\Http\Controllers\AuthController');

    }
    public function attemptToLoginUser($email, $password)
    {
        return $this->auth->attemptLogin($email, $password);
    }

    public function attemptToTo()
    {

    }

}
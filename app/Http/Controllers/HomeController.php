<?php namespace App\Http\Controllers;

use App\MyStuff\ContactDirectory\Contact;
use App\MyStuff\ContactDirectory\ContactRepository;
use App\MyStuff\OptionReturner\OptionReturnerCommandController;
use App\MyStuff\OptionReturner\OptionReturnerInternalService;
use App\MyStuff\UserDirectory\UserAuthenticator;
use App\MyStuff\UserDirectory\UserRepository;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Database\DatabaseManager as DB;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	$router->get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$auth = new UserAuthenticator();

		$auth->attemptToLoginUser('ohermann@gmail.com', 'testtest');

		$auth->auth->getLoggedInUser();

		dd($auth->auth->getSession());

	}

	public function authCheck()
	{

//		if($auth->isLoggedIn())
//		{
//			return 'yup logged in';
//		}
//		return 'nope not logged in';

		dd($auth->auth->getLoggedInUser());
	}

}

<?php namespace App\Http\Controllers;

use App\MyStuff\ContactDirectory\Contact;
use App\MyStuff\ContactDirectory\ContactRepository;
use App\MyStuff\OptionReturner\OptionReturnerCommandController;
use App\MyStuff\OptionReturner\OptionReturnerInternalService;
use App\MyStuff\UserDirectory\UserAuthenticator;
use App\MyStuff\UserDirectory\UserRepository;
use Illuminate\Database\DatabaseManager as DB;
use Illuminate\Foundation\Application;

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

		dd($auth->attemptToLoginUser('ciara13@gleason.com', 'testtest'));
	}

}

<?php namespace App\Http\Controllers;

use App\MyStuff\ContactDirectory\Contact;
use App\MyStuff\ContactDirectory\ContactRepository;
use App\MyStuff\OptionReturner\OptionReturnerCommandController;
use App\MyStuff\OptionReturner\OptionReturnerInternalService;
use Illuminate\Database\DatabaseManager as DB;

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

//		$contactRepo = new ContactRepository();
//
//		$contact = $contactRepo->getAllContactsInAccount(1)[0];
//
//		dd($contact);




	}

}

<?php namespace App\Http\Controllers;

use App\MyStuff\OptionReturner\OptionReturnerCommandController;

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
		$optioncmmdctrl = new OptionReturnerCommandController();
		return ($optioncmmdctrl->getSpecificRole(1));
	}

}

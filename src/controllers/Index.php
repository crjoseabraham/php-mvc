<?php
namespace Controllers;

class Index extends Controller
{
	public function home()
	{
		Controller::view('Index/home');
	}

	public function about()
	{
		Controller::view('Index/about');
	}
}
<?php
namespace Controllers;

class Index extends Controller
{
	public function home()
	{
		echo "<h1> Homepage </h1>";
	}

	public function about()
	{
		echo "<h1> About </h1>";
	}

	public function error404()
	{
		echo "<h1> Not found </h1>";
	}
}
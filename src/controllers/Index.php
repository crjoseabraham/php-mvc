<?php
namespace Controllers;

class Index extends Controller
{
	public function get()
	{
		echo "Homepage";
	}

	public function error404()
	{
		echo "Not found.";
	}
}
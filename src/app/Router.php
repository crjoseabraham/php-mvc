<?php 
namespace Core;

class Router
{
	public function __construct()
	{
		echo $_SERVER['REQUEST_URI'];
	}

	public static function get()
	{
		return 'get';
	}

	public static function post()
	{
		return 'post';
	}
}
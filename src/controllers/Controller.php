<?php
namespace Controllers;

/**
 * Base Controller
 * Loads models and views
 */
abstract class Controller
{
	/**
	 * Instantiate a model
	 * @param  string $model Example: 'Task', 'Session'
	 * @return $model        Returns $model instance
	 */
	public function model(string $model)
	{
		require_once __NAMESPACE__ . '\\' . $model;
		return new $model;
	}

	/**
	 * Loads a view file
	 * @param  string $view Example: 'index', 'about', 'contact'
	 * @param  array  $data Passing vars to the view
	 * @return void
	 */
	public static function view(string $view, array $data = []) : void
	{
		extract($data, EXTR_SKIP);
		
		$file = APPROOT . '/src/views/' . $view . '.php';
		// Check for view file
		if (is_readable($file))
		{
			require_once $file;
		}
		else
		{
			// View does not exist
			die('<h1> 404 Page not found </h1>');
		}
	}
}
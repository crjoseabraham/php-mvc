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
	public function view(string $view, array $data = []) : void
	{
		// Check for view file
		if (file_exists('../app/views/' . $view . '.php'))
		{
			require_once '../app/views/' . $view . '.php';
		}
		else
		{
			// View does not exist
			die('View does not exist');
		}
	}
}
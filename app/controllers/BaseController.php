<?php

class BaseController extends Controller {
	function __construct() {
      $this->beforeFilter(function() {
      	if(!Session::get('authenticated')){
      		return Redirect::to('sessions/create');
      	}
      });
  }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}

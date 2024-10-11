<?php

/**
 * Error 404 controller
 */
class Error404Controller extends BaseController {
	/**
	 * Handles special case: $404
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
		return view('layout', array(array('content', 'error/404')), [
			'show_header' => false
		]);
	}
}
<?php

/*
    Asatru PHP - Example controller

    Add here all your needed routes implementations related to 'index'.
*/

/**
 * Example index controller
 */
class IndexController extends BaseController {
	/**
	 * Handles URL: /
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
		//Generate and return a view by using the helper
		return view('layout', array(array('content', 'index')));
	}

	/**
	 * Handles URL: /download
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function download($request)
	{
		//Generate and return a view by using the helper
		return view('layout', array(array('content', 'download')));
	}

	/**
	 * Handles URL: /documentation
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function documentation($request)
	{
		$pd = new \Parsedown();
		$shell_doc = $pd->text(file_get_contents(app_path('/resources/md/shell.md')));
        $scripting_doc = $pd->text(file_get_contents(app_path('/resources/md/scripting.md')));

		//Generate and return a view by using the helper
		return view('layout', [['content', 'documentation']], [
			'shell_doc' => $shell_doc,
			'scripting_doc' => $scripting_doc]
		);
	}
}

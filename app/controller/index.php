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
		return view('layout', array(array('content', 'index')),['show_header' => true]);
	}

	/**
	 * Handles URL: /download
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function download($request)
	{
		return view('layout', array(array('content', 'download')));
	}

	/**
	 * Handles URL: /examples
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function examples($request)
	{
		$pd = new \Parsedown();
		$examples_doc = $pd->text(file_get_contents(app_path('/resources/md/examples.md')));

		return view('layout', array(array('content', 'examples')), ['examples_doc' => $examples_doc]);
	}

	/**
	 * Handles URL: /extensions
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function extensions($request)
	{
		return view('layout', array(array('content', 'extensions')));
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
		$reference_doc = $pd->text(file_get_contents(app_path('/resources/md/reference.md')));

		$tab = $request->params()->query('tab', 'aquashell');

		return view('layout', [['content', 'documentation']], [
			'shell_doc' => $shell_doc,
			'scripting_doc' => $scripting_doc,
			'reference_doc' => $reference_doc,
			'tab' => $tab
		]);
	}

	/**
	 * Handles URL: /tutorials
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function tutorials($request)
	{
		return view('layout', array(array('content', 'tutorials')),
			[
				'videos' => config('videos')
			]
		);
	}
}

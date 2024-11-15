<?php

/**
 * Index controller
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
		return view('layout', array(array('content', 'index')), [
			'show_header' => true,
			'showcase' => config('showcase')
		]);
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
		$snippets = SnippetsModel::getAll();

		return view('layout', array(array('content', 'examples')), [
			'snippets' => $snippets
		]);
	}

	/**
	 * Handles URL: /plugins
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function plugins($request)
	{
		return view('layout', array(array('content', 'plugins')));
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
		$tutorials = TutorialsModel::getAll();
		
		return view('layout', array(array('content', 'tutorials')), [
			'tutorials' => $tutorials
		]);
	}

	/**
	 * Handles URL: /code/editor
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function code_editor($request)
	{		
		return view('layout', array(array('content', 'playground')), [
		]);
	}

	/**
	 * Handles URL: /code/run
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function code_run($request)
	{		
		try {
			if (!env('CE_ENABLE')) {
				throw new \Exception('Code Editor is not currently activated');
			}

			$code = $request->params()->query('code', '');

			$output = CodeRunnerModule::runCode($code);

			return json([
				'code' => 200,
				'input' => $code,
				'output' => $output
			]);
		} catch (\Exception $e) {
			return json([
				'code' => 500,
				'msg' => $e->getMessage()
			]);
		}
	}

	/**
	 * Handles URL: /sitemap
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return mixed
	 */
	public function sitemap($request)
	{
		try {
			$sitemap = SitemapModule::generate();
			
			header('Content-Type: text/xml');
			echo $sitemap;

			exit(0);
		} catch (\Exception $e) {
			return abort(500);
		}
	}
}

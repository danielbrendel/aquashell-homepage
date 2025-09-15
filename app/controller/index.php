<?php

/**
 * Index controller
 */
class IndexController extends BaseController {
	const INDEX_LAYOUT = 'layout';

	/**
	 * Perform base initialization
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct(self::INDEX_LAYOUT);
	}

	/**
	 * Handles URL: /
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
		return parent::view(['content', 'index'], [
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
		return parent::view(['content', 'download']);
	}

	/**
	 * Handles URL: /plugins
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function plugins($request)
	{
		return parent::view(['content', 'plugins']);
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

		return parent::view(['content', 'documentation'], [
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
		
		return parent::view(['content', 'tutorials'], [
			'tutorials' => $tutorials
		]);
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

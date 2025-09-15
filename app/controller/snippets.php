<?php

/**
 * Snippets controller
 */
class SnippetsController extends BaseController {
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
	 * Handles URL: /snippets
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
        $categories = CategoriesModel::getAll();

		return parent::view(['content', 'snippets/categories'], [
			'categories' => $categories
		]);
	}

	/**
	 * Handles URL: /snippets/category/{name}
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function listing($request)
	{
		$category = CategoriesModel::getCategoryByName($request->arg('name'));
        $snippets = SnippetsModel::getFromCategory($category?->get('id'));

		return parent::view(['content', 'snippets/listing'], [
			'category' => $category,
			'snippets' => $snippets
		]);
	}
}

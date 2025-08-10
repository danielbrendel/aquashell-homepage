<?php

/**
 * Editor controller
 */
class EditorController extends BaseController {
	const INDEX_LAYOUT = 'layout';

	/**
	 * Perform base initialization
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct(self::INDEX_LAYOUT);

		if (!env('CE_ENABLE')) {
            throw new \Exception('Access forbidden');
        }
	}

    /**
	 * Handles URL: /code/editor
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function code_editor($request)
	{		
		return parent::view(['content', 'playground'], [
			'code_runner' => env('CE_RUNNER', 'local')
		]);
	}

	/**
	 * Handles URL: /code/run/local
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function code_run_local($request)
	{		
		try {
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
	 * Handles URL: /code/run/remote
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function code_run_remote($request)
	{		
		try {
			$code = $request->params()->query('code', '');
			$auth = $request->params()->query('auth', '');

			$response = RemoteRunnerModule::runCode($code, $auth);

			if ((!isset($response->code)) || ($response->code != 200)) {
                throw new \Exception('[' . strval($response->code) . '] ' . $response->msg);
            }

			return json([
				'code' => 200,
				'input' => $code,
				'output' => $response->output
			]);
		} catch (\Exception $e) {
			return json([
				'code' => 500,
				'msg' => $e->getMessage()
			]);
		}
	}
}

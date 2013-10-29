<?php
/**
 *
 */
class StatusmineModule extends CWebModule {

	public $defaultController = 'layout';
	public $layout = 'standalone';

	/**
	 * Initializes the module.
	 */
	public function init() {
		// import the module-level models and components
		$this->setImport(
			array(
			     // models
			     $this->getId() . '.models.*',
			     // components
			     $this->getId() . '.components.*',));
		// set the module-level components config
		Yii::app()->setComponents(
			array(
			     'errorHandler' => array(
				     'errorAction' => $this->getId() . '/error',
			     ),
			     'clientScript' => array(
				     'packages' => array(
					     'utilites' => array(
						     'basePath' => '',
						     'baseUrl'  => '/',
						     'js'       => array('js/jquery.min.js', 'js/jquery-ui.min.js', 'js/jquery.plugins.js'),
						     'css'      => array('theme/jquery-ui.css'),
					     ),
					     'element'  => array(
						     'basePath' => '',
						     'baseUrl'  => '/',
						     'js'       => array('js/element.js'),
						     'css'      => array('theme/statusmine.css'),
						     'depends'  => array('utilites'),
					     ),
				     ),
			     ),
			)
		);
		Yii::app()->clientScript->registerPackage('element');
	}
}

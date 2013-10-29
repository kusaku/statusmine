<?php
/**
 *
 */
class LayoutController extends ElementController {

	public $layout = '/layouts/main';

	public function actionView($id = FALSE) {
		parent::actionView(array('preloader' => TRUE));
	}

	public function actionRender($id = FALSE) {
		parent::actionRender(array('preloader' => FALSE));
	}

	public function actionStatus($id = FALSE) {
		parent::actionStatus(array('preloader' => FALSE));
	}
}

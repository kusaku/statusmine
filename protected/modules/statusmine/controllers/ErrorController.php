<?php
/**
 *
 */
class ErrorController extends ElementController {
	public function actionView($id = FALSE) {
		$data = Yii::app()->errorHandler->error;
		parent::actionView($data);
	}

	public function actionRender($id = FALSE) {
		$data = Yii::app()->errorHandler->error;
		parent::actionRender();
	}

	public function actionStatus($id = FALSE) {
		$data = Yii::app()->errorHandler->error;
		parent::actionStatus();
	}
}

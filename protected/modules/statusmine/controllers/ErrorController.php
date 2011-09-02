<?php 
/**
 *
 */
class ErrorController extends ElementController {
	public function actionView($id = false) {
		$data = Yii::app()->errorHandler->error;
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$data = Yii::app()->errorHandler->error;
		parent::actionRender();
	}
	
	public function actionStatus($id = false) {
		$data = Yii::app()->errorHandler->error;
		parent::actionStatus();
	}
}

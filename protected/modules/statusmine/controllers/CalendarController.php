<?php 
/**
 *
 */
class CalendarController extends ElementController {
	public function actionView($id = false) {
		$data = array('date'=>time() - rand(0, 2592000));
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$data = array('date'=>time() - rand(0, 2592000));
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
		$data = array('date'=>time() - rand(0, 2592000));
		parent::actionStatus($data);
	}
}

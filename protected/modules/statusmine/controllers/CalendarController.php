<?php
/**
 *
 */
class CalendarController extends ElementController {
	public function actionView($id = FALSE) {
		$data = array('date' => time());
		parent::actionView($data);
	}

	public function actionRender($id = FALSE) {
		$data = array('date' => time());
		parent::actionRender($data);
	}

	public function actionStatus($id = FALSE) {
		$data = array('date' => time());
		parent::actionStatus($data);
	}
}

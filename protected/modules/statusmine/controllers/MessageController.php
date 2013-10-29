<?php
/**
 *
 */
class MessageController extends ElementController {
	public function actionView($id = FALSE) {
		$data = array('message' => implode(' ', explode('5', md5(rand(0, 2)) . ' ' . md5(rand(0, 2)) . ' ' . md5(rand(0, 2)))));
		parent::actionView($data);
	}

	public function actionRender($id = FALSE) {
		$data = array('message' => implode(' ', explode('5', md5(rand(0, 2)) . ' ' . md5(rand(0, 2)) . ' ' . md5(rand(0, 2)))));
		parent::actionRender($data);
	}

	public function actionStatus($id = FALSE) {
		$data = array('message' => implode(' ', explode('5', md5(rand(0, 2)) . ' ' . md5(rand(0, 2)) . ' ' . md5(rand(0, 2)))));
		parent::actionStatus($data);
	}
}

<?php 
/**
 *
 */
class MessageController extends ElementController {
	public function actionView($id = false) {
		$data = array('message'=>implode(' ', explode('5', md5(rand(0, 2)).' '.md5(rand(0, 2)).' '.md5(rand(0, 2)))));
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$data = array('message'=>implode(' ', explode('5', md5(rand(0, 2)).' '.md5(rand(0, 2)).' '.md5(rand(0, 2)))));
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
		$data = array('message'=>implode(' ', explode('5', md5(rand(0, 2)).' '.md5(rand(0, 2)).' '.md5(rand(0, 2)))));
		parent::actionStatus($data);
	}
}

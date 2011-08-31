<?php 
/**
 *
 */
class ProjectnameController extends ElementController {
	public function actionView($id = false) {
		$data = array('name'=>md5(rand(0, 100)));
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$data = array('name'=>md5(rand(0, 100)));
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
		$data = array('name'=>md5(rand(0, 100)));
		parent::actionStatus($data);
	}
}

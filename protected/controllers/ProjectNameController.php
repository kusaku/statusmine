<?php 
/**
 *
 */
class ProjectNameController extends ElementController {
	public function actionView() {
		$data = array('name'=>md5(rand(0, 100)));
		parent::actionView($data);
	}
	
	public function actionRender() {
		$data = array('name'=>md5(rand(0, 100)));
		parent::actionRender($data);
	}
	
	public function actionStatus() {
		$data = array('name'=>md5(rand(0, 100)));
		parent::actionStatus($data);
	}
}

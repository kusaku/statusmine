<?php 
/**
 *
 */
class ProjectController extends ElementController {
	public function actionView($id = false) {
		$data = array('id'=>$id);
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$data = array('id'=>$id);
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
		$data = array('id'=>$id);
		parent::actionStatus($data);
	}
}

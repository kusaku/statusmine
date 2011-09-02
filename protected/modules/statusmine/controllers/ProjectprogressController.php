<?php 
/**
 *
 */
class ProjectprogressController extends ElementController {
	public function actionView($id = false) {
		$data = array(
			// процент
			'percent'=>rand(0, 100),
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')');
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$data = array(
			// процент
			'percent'=>rand(0, 100),
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')');
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
		$data = array(
			// процент
			'percent'=>rand(0, 100),
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')');
		parent::actionStatus($data);
	}
}

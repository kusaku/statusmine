<?php 
/**
 *
 */
class ProjectProgressController extends ElementController {
	public function actionView() {
		$data = array(
			// процент
			'percent'=>rand(0, 100),
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')');
		parent::actionView($data);
	}
	
	public function actionRender() {
		$data = array(
			// процент
			'percent'=>rand(0, 100),
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')');
		parent::actionRender($data);
	}
	
	public function actionStatus() {
		$data = array(
			// процент
			'percent'=>rand(0, 100),
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')');
		parent::actionStatus($data);
	}
}

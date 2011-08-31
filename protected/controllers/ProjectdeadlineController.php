<?php 
/**
 *
 */
class ProjectdeadlineController extends ElementController {
	public function actionView($id = false) {
		$data = array(
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
			// дата
			'date'=>date('d.m.Y', strtotime('+ '.rand(0, 365).' days')));
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$data = array(
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
			// дата
			'date'=>date('d.m.Y', strtotime('+ '.rand(0, 365).' days')));
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
		$data = array(
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
			// дата
			'date'=>date('d.m.Y', strtotime('+ '.rand(0, 365).' days')));
		parent::actionStatus($data);
	}
}

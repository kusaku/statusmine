<?php 
/**
 *
 */
class ProjectDeadlineController extends ElementController {
	public function actionView() {
		$data = array(
			// цвет
			'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
			// дата
			'date'=>date('d.m.Y', strtotime('+ '.rand(0, 365).' days')));
		parent::actionView($data);
	}
	
	public function actionRender() {
        $data = array(
            // цвет
            'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
            // дата
            'date'=>date('d.m.Y', strtotime('+ '.rand(0, 365).' days')));
		parent::actionRender($data);
	}
	
	public function actionStatus() {
        $data = array(
            // цвет
            'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
            // дата
            'date'=>date('d.m.Y', strtotime('+ '.rand(0, 365).' days')));
		parent::actionStatus($data);
	}
}


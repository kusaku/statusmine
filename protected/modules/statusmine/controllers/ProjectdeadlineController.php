<?php 
/**
 *
 */
class ProjectdeadlineController extends ElementController {
	public function actionView($id = false) {
        $projects = Redmine::readProjects();
        $date = $projects[$id]['updated_on'];       
        $data = array(
            // цвет
            'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
            // дата
            'date'=>date('d.m.Y', strtotime($date)));
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
        $projects = Redmine::readProjects();
        $date = $projects[$id]['updated_on'];       
        $data = array(
            // цвет
            'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
            // дата
            'date'=>date('d.m.Y', strtotime($date)));
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
        $projects = Redmine::readProjects();
        $date = $projects[$id]['updated_on'];       
        $data = array(
            // цвет
            'color'=>'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')',
            // дата
            'date'=>date('d.m.Y', strtotime($date)));
		parent::actionStatus($data);
	}
}

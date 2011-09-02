<?php 
/**
 *
 */
class ProjectnameController extends ElementController {
	public function actionView($id = false) {
        $projects = Redmine::readProjects();
        $name = $projects[$id]['name'];
        $data = array('name'=>$name);
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
        $projects = Redmine::readProjects();
        $name = $projects[$id]['name'];
        $data = array('name'=>$name);
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
        $projects = Redmine::readProjects();
        $name = $projects[$id]['name'];
        $data = array('name'=>$name);
		parent::actionStatus($data);
	}
}

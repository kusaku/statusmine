<?php 
/**
 *
 */
class ProjectsController extends ElementController {
	public function actionView() {
        $projects = Redmine::readProjects();
        foreach ($projects as $id=>$project)
            if (isset($project['parent']))
                unset($projects[$id]);
		parent::actionView(array('projects'=>array_keys($projects)));
	}
	
	public function actionRender() {
        $projects = Redmine::readProjects();
        foreach ($projects as $id=>$project)
            if (isset($project['parent']))
                unset($projects[$id]);
		parent::actionRender(array('projects'=>array_keys($projects)));
	}
	public function actionStatus() {
        $projects = Redmine::readProjects();
        foreach ($projects as $id=>$project)
            if (isset($project['parent']))
                unset($projects[$id]);
		parent::actionStatus(array('projects'=>array_keys($projects)));
	}
}

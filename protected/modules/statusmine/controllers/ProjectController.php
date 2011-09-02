<?php 
/**
 *
 */
class ProjectController extends ElementController {
	public function actionView($id = false) {
		$projects = Redmine::readProjects();
		foreach ($projects as $cid=>$project)
			if (isset($project['parent']) and $project['parent']['id'] == $id)
				$childs[] = $cid;
		$data = array('childs'=>isset($childs) ? $childs : null);
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		parent::actionRender();
	}
	
	public function actionStatus($id = false) {
		parent::actionStatus();
	}
}

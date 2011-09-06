<?php 
/**
 *
 */
class SubprojectsController extends ElementController {
	public function actionView($id) {
		$projects = Redmine::readProjects();
		foreach ($projects as $cid=>$project)
			if (isset($project['parent']) and $project['parent']['id'] == $id)
				$childs[] = $cid;
		$data = array('project_name'=>$projects[$id]['name'], 'childs'=>isset($childs) ? $childs : null);
		parent::actionView($data);
	}
	
	public function actionRender($id = false) {
		$projects = Redmine::readProjects();
		foreach ($projects as $cid=>$project)
			if (isset($project['parent']) and $project['parent']['id'] == $id)
				$childs[] = $cid;
		$data = array('project_name'=>$projects[$id]['name'], 'childs'=>isset($childs) ? $childs : null);
		parent::actionRender($data);
	}
	
	public function actionStatus($id = false) {
		$projects = Redmine::readProjects();
		foreach ($projects as $cid=>$project)
			if (isset($project['parent']) and $project['parent']['id'] == $id)
				$childs[] = $cid;
		$data = array('project_name'=>$projects[$id]['name'], 'childs'=>isset($childs) ? $childs : null);
		parent::actionStatus($data);
	}
}

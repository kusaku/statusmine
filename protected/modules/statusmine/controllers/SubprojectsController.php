<?php
/**
 *
 */
class SubprojectsController extends ElementController {
	public function actionView($id) {
		$projects = Redmine::readProjects();
		foreach ($projects as $cid => $project) {
			if (isset($project['parent']) and $project['parent']['id'] == $id) {
				$childs[] = $cid;
			}
		}
		$data = array('project_name' => $projects[$id]['name'], 'childs' => isset($childs) ? $childs : NULL);
		parent::actionView($data);
	}

	public function actionRender($id = FALSE) {
		$projects = Redmine::readProjects();
		foreach ($projects as $cid => $project) {
			if (isset($project['parent']) and $project['parent']['id'] == $id) {
				$childs[] = $cid;
			}
		}
		$data = array('project_name' => $projects[$id]['name'], 'childs' => isset($childs) ? $childs : NULL);
		parent::actionRender($data);
	}

	public function actionStatus($id = FALSE) {
		$projects = Redmine::readProjects();
		foreach ($projects as $cid => $project) {
			if (isset($project['parent']) and $project['parent']['id'] == $id) {
				$childs[] = $cid;
			}
		}
		$data = array('project_name' => $projects[$id]['name'], 'childs' => isset($childs) ? $childs : NULL);
		parent::actionStatus($data);
	}
}

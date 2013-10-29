<?php
/**
 *
 */
class ProjectController extends ElementController {
	public function actionView($id) {
		$projects = Redmine::readProjects();
		/*
		foreach ($projects as $cid => $project) {
			if (isset($project['parent']) and $project['parent']['id'] == $id) {
				$childs[] = $cid;
			}
		}
		*/
		$data = array(
			'name'        => $projects[$id]['name'],
			'description' => $projects[$id]['description'],
			'update'      => date('Y.m.d', strtotime($projects[$id]['updated_on'])),
			'issuescount' => Redmine::readIssuesCount(
				array(
				     'project_id' => $id, 'status_id' => '*'
				)),
			'childs'      => isset($childs) ? $childs : NULL
		);
		parent::actionView($data);
	}

	public function actionRender($id) {
		$project = Redmine::readProject($id);
		$data    = array(
			'name'        => $project['name'],
			'description' => $project['description'],
			'update'      => date('Y.m.d', strtotime($project['updated_on'])),
			'issuescount' => Redmine::readIssuesCount(
				array(
				     'project_id' => $id, 'status_id' => '*'
				))
		);
		parent::actionRender($data);
	}

	public function actionStatus($id) {
		$project = Redmine::readProject($id);
		$data    = array(
			'name'        => $project['name'],
			'description' => $project['description'],
			'update'      => date('Y.m.d', strtotime($project['updated_on'])),
			'issuescount' => Redmine::readIssuesCount(
				array(
				     'project_id' => $id, 'status_id' => '*'
				))
		);
		parent::actionStatus($data);
	}
}

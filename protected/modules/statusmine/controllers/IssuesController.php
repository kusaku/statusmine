<?php
/**
 *
 */
class IssuesController extends ElementController {
	public function actionView($id, $start = 0, $count = 10) {
		$project = Redmine::readProject($id);
		$issues  = Redmine::readIssues(
			'id',
			array(
			     'sort'       => 'updated_on:desc',
			     'project_id' => $id,
			     'status_id'  => '*',
			     'start'      => $start,
			     'count'      => $count
			));
		parent::actionView(
			array(
			     'issues' => array_keys($issues),
			     'name'   => $project['name']
			));
	}

	public function actionRender($id, $start = 0, $count = 5) {
		$project = Redmine::readProject($id);
		$issues  = Redmine::readIssues(
			'id',
			array(
			     'sort'       => 'updated_on:desc',
			     'project_id' => $id,
			     'status_id'  => '*',
			     'start'      => $start,
			     'count'      => $count
			));
		parent::actionRender(
			array(
			     'issues' => array_keys($issues),
			     'name'   => $project['name']
			));
	}

	public function actionStatus($id, $start = 0, $count = 5) {
		$project = Redmine::readProject($id);
		$issues  = Redmine::readIssues(
			'id',
			array(
			     'sort'       => 'updated_on:desc',
			     'project_id' => $id,
			     'status_id'  => '*',
			     'start'      => $start,
			     'count'      => $count
			));
		parent::actionStatus(
			array(
			     'issues' => array_keys($issues),
			     'name'   => $project['name']
			));
	}
}

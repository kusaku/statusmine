<?php
/**
 *
 */
class IssueController extends ElementController {
	public function actionView($id) {
		$issue = Redmine::readIssue($id);
		$data  = array(
			'project_name'   => $issue['project']['name'],
			'subject'        => $issue['subject'],
			'status'         => $issue['status']['name'],
			'percent'        => $issue['done_ratio'],
			'progress_color' => 'rgb(' . round(max(array((50 - $issue['done_ratio']) / 50 * 192, 0))) . ',' . round(max(array(($issue['done_ratio'] - 50) / 50 * 192, 0))) . ',' . round((50 - abs($issue['done_ratio'] - 50)) / 50 * 192) . ')',
			'updated_on'     => date('Y.m.d', strtotime($issue['updated_on'])),
			'updated_color'  => 'rgb(0,192,0)');
		parent::actionView($data);
	}

	public function actionRender($id) {
		$issue = Redmine::readIssue($id);
		$data  = array(
			'subject'        => $issue['subject'],
			'status'         => $issue['status']['name'],
			'percent'        => $issue['done_ratio'],
			'progress_color' => 'rgb(' . round(max(array((50 - $issue['done_ratio']) / 50 * 192, 0))) . ',' . round(max(array(($issue['done_ratio'] - 50) / 50 * 192, 0))) . ',' . round((50 - abs($issue['done_ratio'] - 50)) / 50 * 192) . ')',
			'updated_on'     => date('Y.m.d', strtotime($issue['updated_on'])),
			'updated_color'  => 'rgb(0,192,0)');
		parent::actionRender($data);
	}

	public function actionStatus($id) {
		$issue = Redmine::readIssue($id);
		$data  = array(
			'subject'        => $issue['subject'],
			'status'         => $issue['status']['name'],
			'percent'        => $issue['done_ratio'],
			'progress_color' => 'rgb(' . round(max(array((50 - $issue['done_ratio']) / 50 * 192, 0))) . ',' . round(max(array(($issue['done_ratio'] - 50) / 50 * 192, 0))) . ',' . round((50 - abs($issue['done_ratio'] - 50)) / 50 * 192) . ')',
			'updated_on'     => date('Y.m.d', strtotime($issue['updated_on'])),
			'updated_color'  => 'rgb(0,192,0)');
		parent::actionStatus($data);
	}
}

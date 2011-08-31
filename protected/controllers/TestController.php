<?php 
/**
 *
 */
class TestController extends ElementController {
	public function actionView($id = false) {
		set_time_limit(600);
		echo '<pre>';
		//$var = Redmine::getProjects();
		//print_r($var);
		//$var = Persistent::model()->var or
		//$var = Redmine::createIssue(array('subject'=>'Пример', 'project_id'=>'suptask', 'priority_id'=>4));
		$var = Redmine::readUser(72);
		/*foreach ($var as $key=>$value) {
			try {
				Redmine::updateIssue($key, array('done_ratio'=>100));
			}
			catch(exception $e) {
			
			}
		}*/
		//Persistent::model()->var = $var;
		//$var = Redmine::getAttachment(6144);
		echo "\n".'count($var): '.count($var);
		echo "\n".'print_r($var): '.print_r($var, true);
		//$data = array('var'=>$var);
		//parent::actionView($data);
	}
}

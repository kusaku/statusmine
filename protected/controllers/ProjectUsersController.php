<?php 
/**
 *
 */
class ProjectUsersController extends ElementController {
	public function actionView() {
		$count = rand(1, 4);
		$we = array('konstantin.i@fabricasaitov.ru', 'dmitry.k@fabricasaitov.ru', 'kirill.a@fabricasaitov.ru');
		$data = array();
		for ($i = 0; $i < $count; $i++) {
			$data[] = array('gravatar'=>md5($we[rand(0, 2)]));
		}
		parent::actionView($data);
	}
	
	public function actionRender($naked = false) {
		$count = rand(1, 4);
		$we = array('konstantin.i@fabricasaitov.ru', 'dmitry.k@fabricasaitov.ru', 'kirill.a@fabricasaitov.ru');
		$data = array();
		for ($i = 0; $i < $count; $i++) {
			$data[] = array('gravatar'=>md5($we[rand(0, 2)]));
		}
		parent::actionRender($data, $naked);
	}
	
	public function actionStatus() {
		$count = rand(1, 4);
		$we = array('konstantin.i@fabricasaitov.ru', 'dmitry.k@fabricasaitov.ru', 'kirill.a@fabricasaitov.ru');
		$data = array();
		for ($i = 0; $i < $count; $i++) {
			$data[] = array('gravatar'=>md5($we[rand(0, 2)]));
		}
		parent::actionStatus($data);
	}
}

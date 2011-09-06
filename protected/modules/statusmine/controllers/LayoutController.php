<?php 
/**
 *
 */
class LayoutController extends ElementController {

    public $layout = '/layouts/main';
	
	public function actionView($id = false) {
		parent::actionView(array('preloader'=>true));
	}
	
	public function actionRender($id = false) {
		parent::actionRender(array('preloader'=>false));
	}
	
	public function actionStatus($id = false) {
		parent::actionStatus(array('preloader'=>false));
	}
}

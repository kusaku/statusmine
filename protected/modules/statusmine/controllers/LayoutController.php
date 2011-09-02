<?php 
/**
 *
 */
class LayoutController extends ElementController {

    public $defaultAction = 'view';
    
    public $layout = 'standalone';
	
	public function actionView($id = false) {		
		parent::actionView();
	}
	
	public function actionRender($id = false) {
		parent::actionRender();
	}
	
	public function actionStatus($id = false) {
		parent::actionStatus();
	}
}

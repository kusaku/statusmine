<?php 
/**
 * Base controller for page element
 */
class ElementController extends CController {

	public $layout = '//layouts/element';
	
	public function filters() {
		return array('accessControl - index', 'ajaxOnly + status', 'postOnly + status');
	}
	
	/*public function accessRules() {
	 return array(
	 // allow authenticated users to access all actions
	 array('allow', 'users'=>array('@'), ),
	 // deny all other users
	 array('deny', 'users'=>array('*'), ), );
	 }*/
	
	public function actionIndex() {
		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			if (Yii::app()->getRequest()->getIsPostRequest()) {
				$this->run('status');
			} else {
				$this->run('render');
			}
		} else {
			$this->run('view');
		}
	}
	
	public function actionView($data = null) {
		$base = Yii::app()->getUrlManager()->getBaseUrl();
		$url = Yii::app()->getUrlManager()->createUrl($this->route);
		$this->render('//elements/'.$this->id, array('base'=>$base, 'url'=>$url, 'data'=>$data));
	}
	
	public function actionRender($data = null) {
		$base = Yii::app()->getUrlManager()->getBaseUrl();
		$url = Yii::app()->getUrlManager()->createUrl($this->route);
		$this->renderPartial('//elements/'.$this->id, array('base'=>$base, 'url'=>$url, 'data'=>$data));
	}
	
	public function actionStatus($data = null) {
		$base = Yii::app()->getUrlManager()->getBaseUrl();
		$url = Yii::app()->getUrlManager()->createUrl($this->route);
		print(json_encode(array('base'=>$base, 'url'=>$url, 'data'=>$data)));
	}
}

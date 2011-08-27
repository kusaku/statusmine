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
				// json
				$this->run('status');
			} else {
				// html
				$this->run('render');
			}
		} else {
			// separated page
			$this->run('view');
		}
	}
	
	public function actionView($data = array()) {
		$base = Yii::app()->getUrlManager()->getBaseUrl();
		$url = Yii::app()->getUrlManager()->createUrl($this->id);
		$this->render('//elements/envelope', array('base'=>$base, 'url'=>$url, 'data'=>$data));
	}
	
	public function actionRender($data = array()) {
		$base = Yii::app()->getUrlManager()->getBaseUrl();
		$url = Yii::app()->getUrlManager()->createUrl($this->id);
		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			$this->renderPartial('//elements/'.$this->id, array('base'=>$base, 'url'=>$url, 'data'=>$data));
		} else {
			$this->renderPartial('//elements/envelope', array('base'=>$base, 'url'=>$url, 'data'=>$data));
		}
	}
	
	public function actionStatus($data = array()) {
		$base = Yii::app()->getUrlManager()->getBaseUrl();
		$url = Yii::app()->getUrlManager()->createUrl($this->id);
		print(json_encode(array('base'=>$base, 'url'=>$url, 'data'=>$data)));
	}
}

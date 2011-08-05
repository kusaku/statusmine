<?php
class UsersController extends Controller
{

	/*
		Действие по умолчанию - выводим полный список всех людей
	*/
	public function actionIndex()
	{
		$peoples = Users::getAll();
		$this->render('index',array('users'=>$peoples));
	}
	
	/*
		Действие при заданном параметре.
		Возвращаем форму с данными человека.
	*/
	public function actionView()
	{
		$id = Yii::app()->request->getParam('id');
		$parent = Yii::app()->request->getParam('parent');

		if ( !$parent ) $parent = 0; // Может вообще ничего не придти, т.ч. присвоим 0

		if ( $id ) // Если передан нулевой ID, создаём нового человека (создавать нового человека всегда прикольно ;-) )
			$people = People::getById( $id );
			else
			{
				$people = new People();
				$people->parent_id = $parent;
			}

		$this->renderPartial('view',array('people'=>$people));
	}
	
	/*
		Сохраняем данные, которые вернулись из формы.
	*/
	public function actionSave($data = null)
	{
		if ( !$data ) $data = $_POST; // Если нам не передали параметр $DATA, берём данные из $_POST
		if ( isset ($data['id']) )
		{
			if ( $data['id'] ) $people = People::GetById($data['id']);
			else $people = new People();
			$people->fio = $data['fio'];
			$people->parent_id = $data['parent_id']; // ID клиента. Если задано, это это контактное лицо клиента.
			$people->mail = $data['mail'];
			$people->pgroup_id = 7; // Просто клиент
			$people->state = $data['state'];
			$people->phone = $data['phone'];
			$people->firm = $data['firm'];
			$people->descr = $data['descr'];
			$people->save();
			// Возвращаемся к редактируемому (добавляемому) элементу
			//$this->redirect(Yii::app()->homeUrl.'people/'.$people->id);
			$this->redirect(Yii::app()->homeUrl);
		}
		else throw new CHttpException('_00','Не указан идентификатор (ID) человека!');
	}


}
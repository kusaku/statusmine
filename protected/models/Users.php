<?php
/*
	Класс таблицы People
*/

class Users extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'users';
    }
    
    /*
    	Описаны отношения с другими таблицами БД
    */
/*    public function relations() 
    {
		return array(
			'people_group'=>array(self::BELONGS_TO, 'PeopleGroup', 'pgroup_id'),
			'my_packages'=>array(self::HAS_MANY, 'Package', 'manager_id'),
			'my_sites'=>array(self::HAS_MANY, 'Site', 'client_id'),
			'contacts'=>array(self::HAS_MANY, 'People', 'parent_id'),
			'parent'=>array(self::BELONGS_TO,'People',	'parent_id'),
			'packages'=>array(self::HAS_MANY, 'Package', 'client_id', 'order'=>'dt_change DESC')
			);
	}*/

    /*
    	Возвращает человека по его ID
    */
    public static function getById($id)
    {
    	return self::model()->find(array('condition'=>"id=$id", 'limit'=>1));
    }

	/*
    	Возвращает человека по его Login
    */
    public static function getByLogin($login)
    {
    	return self::model()->find(array('condition'=>"login='$login'", 'limit'=>1));
    }

    /*
    	Возвращает список всех людей (вне зависимости от роли)
    */
    public static function getAll()
    {
    	$users = self::model()->findAll();
    	return $users;
    }
}
?>
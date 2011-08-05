<?php
/*
* This file is part of StatusMine.
*
* StatusMine is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* StatusMine is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with MailTeleport. If not, see <http://www.gnu.org/licenses/>.
*/

class PController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		$projects = Redmine::getProjects();

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = 'main';
		$this->render('index', array('projects'=>$projects));
	}

	public function actionView()
	{
		$issues = Redmine::getIssues( Yii::app()->request->getParam('id') );

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = 'main';
		$this->render('view', array('issues'=>$issues));
	}
}
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

class UsersController extends Controller
{
	/**
	 * In my Redmine custom_field id-3 contains information about the birthday person.
	 * It will be used to calculate the days before the birthday this year.
	 *
	 * Example:
	 *	<custom_fields type="array">
	 *		<custom_field name="BirthDay" id="3">
	 *			<value>1985-03-12</value>
	 *		</custom_field>
	 *	</custom_fields>
	 *
	 */
	public function actionIndex()
	{
		$peoplesArray = array();

		$peoples = Redmine::getUsers();
		foreach ($peoples as $people) {

			foreach ($people->custom_fields->custom_field as $field) {
				if ($field['id'] == 3 )
					$birthDay = $field->value.' ';
			}

			$peoplesArray[] = array(
				'id'=>$people->id,
				'login'=> $people->login,
				'birthDay' => $birthDay,
				'firstname'=>$people->firstname,
				'lastname'=>$people->lastname
			);
		}

		$this->render('index',array('users'=>$peoplesArray));
	}

}
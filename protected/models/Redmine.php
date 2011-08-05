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
class Redmine
{
	private static function runRequest($restUrl, $method = 'GET', $data = "")
	{
		$config = Yii::app()->params['RedmineConfig'];

		// Формируем правильный урл
		$url = $config['protocol'].'://'.$config['url'];

        $method = mb_strtolower($method);
        $curl = curl_init();

		switch ($method) {
			case "post":
				curl_setopt($curl, CURLOPT_POST, 1);
				if(isset($data)) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "put":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT'); 
				if(isset($data)) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "delete":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				break;
			default: // get
				break;
		}
 
		try {
			curl_setopt($curl, CURLOPT_URL, $url.$restUrl);
			curl_setopt($curl, CURLOPT_PORT, $config['port']);
			curl_setopt($curl, CURLOPT_USERPWD, $config['rootLogin'].":".$config['rootPassword'] );

			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_COOKIESESSION, true);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_AUTOREFERER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml", "Charset=utf-8", "Content-length: ".strlen($data)));
 
			$response = curl_exec($curl); 
			if(!curl_errno($curl)){ 
		  		$info = curl_getinfo($curl);
			} else {
				curl_close($curl); 
				return false;
			}
			curl_close($curl); 
		} catch (Exception $e) {
    		return false;
		}

		if($response) {
			if(substr($response, 0, 5) == '<?xml') {
				return new SimpleXMLElement($response);
			} else {
				return false;
			}
		}
		return true;
    }

	/**
	 * Возвращаем список всех пользователей
	 * @return Object
	 */
	public static function getUsers() {
		return Redmine::runRequest('/users.xml', 'GET', '');
	}

	/**
	 * Возвращаем массив вида Array( [alaksey.d] => 50 [elena.c] => 39 [igor.p] => 5 ) соответствие Login-ID
	 * Нужно переделать с учётом, что пользователей может быть более 100
	 * @return Array
	 */
	public static function getUsersArray() {
		$users = Redmine::runRequest('/users.xml?limit=100&status=', 'GET', '');
		$usersArray = array();
		foreach ($users as $user) {
			$usersArray[ trim( mb_strToLower( (string)$user->login ) ) ] = (int)$user->id;
		}
		return $usersArray;
	}

	/**
	 * Возвращаем пользователя Redmine по его логину.
	 * @param String $login
	 * @return Object
	 */
	public static function getUserByLogin($login) {
		if ( $login ){
			$login = trim( mb_strToLower( $login ) );
			$users = Redmine::runRequest('/users.xml?status=&limit=100', 'GET', '');
			foreach ($users as $user) {
				if ( trim( mb_strToLower( $user->login ) ) == $login ){
					return $user;
				}
			}
		}
		return false;
	}

	// http://www.gravatar.com/avatar/9d868bd51327f1f89aa1325da5bd4e13?s=50
	public static function getUserAvatarUrlById($id, $size = 50) {
		$user = Redmine::runRequest('/users/'.$id.'.xml', 'GET', '');
		if ($user->mail)
		return 'http://www.gravatar.com/avatar/'.md5($user->mail).'?s='.$size;
		else return false;
	}

	/**
	 * Возвращаем список всех проектов. Не используется, но коль реалезовано - пусть остаётся.
	 * @return Object
	 */
	public static function getProjects() {
		return Redmine::runRequest('/projects.xml', 'GET', '');
	}
 
	/**
	 * Возвращаем все задачи проекта. Не используется.
	 * @param <type> $projectId
	 * @return Object
	 */
	public static function getIssues($projectId = null) {
		// Если проект не передали, то используем проект по умолчанию
		if ( $projectId === null ) $projectId = Yii::app()->params['RedmineConfig']['targetProjectId'];
		return Redmine::runRequest('/issues.xml?project_id='.$projectId, 'GET', '');
	}

	/**
	 * Возвращает задачу с комментариями.
	 *
	 * @param int $IssueId
	 * @return Object
	 */
	public static function getIssue($IssueId) {
		return Redmine::runRequest('/issues/'.$IssueId.'.xml?include=journals&sort=updated_on:desc&page=1', 'GET', '');
	}

	/**
	 * Возвращает процент готовности задачи по ID.
	 * @param int $IssueId
	 * @return int
	 */
	public static function getIssuePercent($IssueId) {
		return ( int ) Redmine::runRequest('/issues/'.$IssueId.'.xml', 'GET', '')->done_ratio;
	}


	/**
	 *  Добавляем задачу.
	 *
	 * @param string $subject
	 * @param text $description
	 * @param int $assignmentUserId
	 * @param int $parentIssueId
	 * @param <type> $created_on
	 * @param <type> $due_date
	 * @return 
	 */
	public static function addIssue($subject, $description, $assignmentUserId = 1, $parentIssueId = 0, $created_on = false, $due_date = false) {
		$priority_id = 4;
 
		$xml = new SimpleXMLElement('<?xml version="1.0"?><issue></issue>');
		$xml->addChild('subject', htmlspecialchars($subject));
		$xml->addChild('project_id', Yii::app()->params['RedmineConfig']['targetProjectId']); // Берём проект из настроек
		$xml->addChild('priority_id', $priority_id);
		$xml->addChild('description', htmlspecialchars($description));
//		$xml->addChild('category_id', $category_id);
		if($parentIssueId) $xml->addChild('parent_issue_id', $parentIssueId);
		if($created_on) $xml->addChild('start_date', $created_on);		
		if($due_date) $xml->addChild('due_date', $due_date);
		$xml->addChild('assigned_to_id', $assignmentUserId);

		return Redmine::runRequest('/issues.xml', 'POST', $xml->asXML() );
	}
 
	/**
	 * Добавляем комментарий к задаче
	 * 
	 * @access public
	 * @param mixed $issueId
	 * @param mixed $note
	 * @return void
	 */
	public static function addNoteToIssue($issueId, $note) {
		$xml = new SimpleXMLElement('<?xml version="1.0"?><issue></issue>');
		$xml->addChild('id', $issueId);
		$xml->addChild('notes', htmlspecialchars($note));
		return Redmine::runRequest('/issues/'.$issueId.'.xml', 'PUT', $xml->asXML() );
	}
 
}
?>

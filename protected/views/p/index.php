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
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<?php
//print_r($projects);
foreach ($projects as $project) {
	print '<a href="/p/'.$project->id.'">'.$project->name.'</a><br>';
}

?>
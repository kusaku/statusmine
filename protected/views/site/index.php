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
<div class="outer full">
	<div class="left fullh">
		<div class="header">
			<div class="name">
				<span class="text">Проект</span>
			</div>
			<div class="progress">
				<span class="text">Прогресс</span>
			</div>
			<div class="deadline">
				<span class="text">Dead Line</span>
			</div>
			<div class="users">
				<span class="text">Участники</span>
			</div>
		</div>
		<?php $this->forward('/project/render', false); ?>
	</div>
	<div class="right fullh">
		<div class="layout fullh">
			<div class="calendar">
				<div class="time">22:22</div>
				<div class="date">чт, 7 апреля 1983</div>
				<div class="innershadow full"></div>
			</div>
		</div>
	</div>
</div>
<?php 
/*
 <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
 <?php
 //print_r($issues);
 foreach ($issues as $issue) {
 print $issue->id.' '.
 $issue->subject.' '.
 $issue->updated_on.' '.
 $issue->author['name'].' '.
 $issue->done_ratio.'% '.
 '<img src="'.Redmine::getUserAvatarUrlById( $issue->author['id'] , 20).'">'.
 ' -> '.
 $issue->assigned_to['name'].
 '<img src="'.Redmine::getUserAvatarUrlById( $issue->assigned_to['id'] , 20).'">'.
 '<br>';
 }
 ?>
 */

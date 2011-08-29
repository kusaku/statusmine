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
		<?php $this->forward('/projects/render', false); ?>
	</div>
	<div class="right fullh">
		<div class="layout fullh">
			<?php $this->forward('/calendar/render', false); ?>
			<?php $this->forward('/messages/render', false); ?>
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
*/
?>

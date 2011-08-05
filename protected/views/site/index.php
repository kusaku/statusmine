<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<?php
//print_r($issues);
foreach ($issues as $issue) {
	print $issue->id.' '.
			$issue->subject.' '.
			$issue->updated_on.' '.
			$issue->author['name'].
			'<img src="'.Redmine::getUserAvatarUrlById( $issue->author['id'] , 50).'">'.
			' -> '.
			$issue->assigned_to['name'].
			'<img src="'.Redmine::getUserAvatarUrlById( $issue->assigned_to['id'] , 50).'">'.

			'<br>';
}

?>
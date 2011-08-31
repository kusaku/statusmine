<?php $this->pageTitle = Yii::app()->name.' - Error'; ?>
<div class="header standalone">
	<div class="<?= $this->getId(); ?>">
		<span class="text">Error <?= $code; ?></span>
	</div>
</div>
<div href="<?= @$_SERVER['HTTP_REFERER']; ?>" class="element error" style="font-size:50%">
	<pre><?= CHtml::encode($message); ?></pre>
</div>

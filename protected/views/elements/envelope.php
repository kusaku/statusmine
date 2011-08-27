<div lang="<?= $base; ?><?= $url; ?>" class="<?= $this->id; ?>">
	<?php $this->renderPartial('//elements/'.$this->id, array('base'=>$base, 'url'=>$url, 'data'=>$data))?>
</div>

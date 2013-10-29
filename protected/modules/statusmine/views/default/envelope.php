<?php if (isset($standalone)): ?>
<?php $this->renderPartial('/elements/'.$this->getId(), array('base'=>$base, 'url'=>$url, 'header'=>true, 'data'=>$data, ))?>
<?php endif; ?>
<div href="<?= $base; ?><?= $url; ?>" rel="<?= Yii::app()->getRequest()->getParam('id'); ?>" class="element <?= isset($standalone)? 'standalone' : ''?> <?= $this->getId(); ?>">
	<?php $this->renderPartial('/elements/'.$this->getId(), array('base'=>$base, 'url'=>$url, 'data'=>$data, ))?>
</div>
<?php if (isset($standalone)): ?>
<?php $this->renderPartial('/elements/'.$this->getId(), array('base'=>$base, 'url'=>$url, 'footer'=>true, 'data'=>$data, ))?>
<?php endif; ?>

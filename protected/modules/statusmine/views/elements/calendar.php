<?php if (isset($header)): ?>
<div class="header standalone">
	<div class="<?= $this->getId(); ?>">
		<span class="text">Календарь</span>
	</div>
</div>
<?php elseif (isset($footer)): ?>
<?php else : ?>
<div class="time">
		<?= date('H', $data['date']); ?><span>:</span><?= date('i', $data['date']); ?>
</div>
<?php $dow = array('пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'); ?>
<?php $moy = array('январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'); ?>
<div class="date">
	<?= $dow[date('N', $data['date']) - 1]; ?>
	,
	<?= date('d', $data['date']); ?>
	<?= $moy[date('m', $data['date']) - 1]; ?>
	<?= date('Y', $data['date']); ?>
</div>
<div class="innershadow"></div>
<?php endif; ?>

<?php if (isset($header)): ?>
<div class="header standalone">
	<div class="<?= $this->getId(); ?>">
		<span class="text">Элемент по-умолчанию</span>
	</div>
</div>
<?php elseif (isset($footer)): ?>
<div class="header standalone">
    <div class="<?= $this->getId(); ?>">
        <span class="text">Элемент по-умолчанию</span>
    </div>
</div>
<?php else : ?>
<dl>
	<?php foreach ($data as $key=>$value): ?>
	<dt>
		<?= (string) $key; ?>
	</dt>
	<dd>
		<?= (string) $value; ?>
	</dd>
	<?php endforeach; ?>
</dl>
<?php endif; ?>
<?php if (isset($header)): ?>
<div class="header standalone">
	<div class="<?= $this->getId(); ?>">
		<span class="text"><?= $data['type']; ?> code <?= $data['code']; ?></span>
	</div>
</div>
<?php elseif (isset($footer)): ?>
<div class="header standalone">
    <div class="<?= $this->getId(); ?>">
        <span class="text"><?= $data['file']; ?> line <?= $data['line']; ?></span>
    </div>
</div>
<?php else : ?>
<pre><?= CHtml::encode($data['message']); ?></pre>
<?php endif; ?>
<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="<?= $this->getId(); ?>">
        <span class="text">Сообщение</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<span class="text"><?= $data['message']; ?></span>
<?php endif; ?>
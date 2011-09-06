<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="<?= $this->getId(); ?>">
        <span class="text">Сообщения</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<div class="inset"></div>
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<?php foreach (array(1, 1, 1, 1) as $_GET['id']): ?>
<?php $this->forward('message/render', false); ?>
<?php endforeach; ?>
<?php endif; ?>
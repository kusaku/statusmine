<?php if (isset($header)): ?>
<div class="header standalone <?= $this->getId(); ?>">
    <span class="text"><?= $data['type']; ?> code <?= $data['code']; ?></span>
</div>
<?php elseif (isset($footer)): ?>
<div class="footer standalone <?= $this->getId(); ?>">
    <span class="text"><?= $data['file']; ?> line <?= $data['line']; ?></span>
</div>
<?php else : ?>
<div class="inset"></div>
<span class="text"><?= CHtml::encode($data['message']); ?></span>
<?php endif; ?>
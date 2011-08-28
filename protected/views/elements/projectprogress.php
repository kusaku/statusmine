<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="projectprogress">
        <span class="text">Прогресс</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<div class="inset full"></div>
<div class="bar round" style="width:<?= (int)@$data['percent']; ?>%;background-color:<?= (string)@$data['color']; ?>">
	<div class="outset full round"></div>
	<span class="text"><?= (int)@$data['percent']; ?>%</span>
</div>
<?php endif; ?>
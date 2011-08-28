<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="projectname">
        <span class="text">Проект</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<div class="inset full"></div>
<span class="text"><?= (string)@$data['name']; ?></span>
<?php endif; ?>
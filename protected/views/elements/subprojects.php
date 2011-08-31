<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="subprojects">
        <span class="text">Подпрокты проекта</span>
    </div>
</div>  
<div class="header">
    <div class="projectname">
        <span class="text">Проект</span>
    </div>
    <div class="projectprogress">
        <span class="text">Прогресс</span>
    </div>
    <div class="projectdeadline">
        <span class="text">Dead Line</span>
    </div>
    <div class="projectusers">
        <span class="text">Участники</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<?php foreach (array(5, 3, 1) as $_GET['id']): ?>
<?php $this->forward('/project/render', false); ?>
<?php endforeach; ?>
<?php endif; ?>
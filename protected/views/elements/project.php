<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="project">
        <span class="text">Имя проекта</span>
    </div>
</div>  
<div class="header standalone">
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
<?php $this->forward('/projectname/render', false); ?>
<?php $this->forward('/projectprogress/render', false); ?>
<?php $this->forward('/projectdeadline/render', false); ?>
<?php $this->forward('/projectusers/render', false); ?>
<?php if (rand(0, 100) > 80): ?>
<?php $this->forward('/subprojects/render', false); ?>
<?php endif; ?>
<?php endif; ?>
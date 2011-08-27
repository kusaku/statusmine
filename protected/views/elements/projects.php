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
<?php for ($i = 0; $i < 5; $i++): ?>
<?php $this->forward('/project/render', false); ?>
<?php endfor; ?>
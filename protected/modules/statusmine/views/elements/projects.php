<?php if (isset($header)): ?>
<div class="header standalone">
	<div class="projects">
		<span class="text">Главные проекты</span>
	</div>
</div>
<?php elseif (isset($footer)): ?>
<?php else : ?>
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
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<?php foreach ($data as $_GET['id']): ?>
<?php $this->forward('project/render', false); ?>
<?php endforeach; ?>
<?php unset($_GET['id']); ?>
<?php endif; ?>
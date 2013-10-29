<?php if (isset($header)): ?>
<div class="header standalone <?= $this->getId(); ?>">
    <div class="projects">
        <span class="text">Задачи проекта <?= $data['name']; ?></span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else : ?>
<div class="header standalone issue">
	<div class="subject">
		<span class="text">Тема</span>
	</div>
	<div class="status">
		<span class="text">Статус</span>
	</div>
	<div class="progress">
		<span class="text">Прогресс</span>
	</div>
	<div class="updated">
		<span class="text">Обновлена</span>
	</div>
</div>
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<?php foreach ($data['issues'] as $_GET['id']): ?>
<?php $this->forward('issue/render', false); ?>
<?php endforeach; ?>
<?php unset($_GET['id']); ?>
<?php endif; ?>

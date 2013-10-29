<?php if (isset($header)): ?>
<div class="header standalone <?= $this->getId(); ?>">
    <div class="projects">
        <span class="text">Главные проекты</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else : ?>
<div class="header standalone project">
	<div class="name">
		<span class="text">Название</span>
	</div>
	<div class="description">
		<span class="text">Описание</span>
	</div>
    <div class="issuescount">
        <span class="text">Задач</span>
    </div>	
	<div class="update">
		<span class="text">Обновлен</span>
	</div>
</div>
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<?php foreach ($data['projects'] as $_GET['id']): ?>
<?php $this->forward('project/render', false); ?>
<?php endforeach; ?>
<?php unset($_GET['id']); ?>
<?php endif; ?>

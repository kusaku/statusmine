<?php if (isset($header)): ?>
<div class="header standalone <?= $this->getId(); ?>">
    <div class="projects">
        <span class="text">Проект <?= $data['name']; ?></span>
    </div>
</div>
<div class="header standalone <?= $this->getId(); ?>">
	<div class="name">
		<span class="text">Проект</span>
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
<?php elseif (isset($footer)): ?>
<?php else : ?>
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<div class="name">
	<div class="inset"></div>
	<span class="text"><?= $data['name']; ?></span>
</div>
<div class="description">
	<div class="inset"></div>
	<span class="text"><?= $data['description']; ?></span>
</div>
<div class="issuescount">
    <div class="inset"></div>
    <span class="text"><?= $data['issuescount']; ?></span>
</div>
<div class="update">
	<div class="inset"></div>
	<span class="text"><?= $data['update']; ?></span>
</div>
<?php $temp = $_GET['id']; ?>
<?php $this->forward('issues/render', false); ?>
<?php $_GET['id'] = $temp; ?>
<?php if (isset($data['childs'])): ?>
<?php $this->forward('subprojects/render', false); ?>
<?php endif; ?>
<?php endif; ?>
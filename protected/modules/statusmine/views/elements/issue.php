<?php if (isset($header)): ?>
<div class="header standalone <?= $this->getId(); ?>">
    <div class="projects">
        <span class="text">Задача проекта <?= $data['project_name']; ?></span>
    </div>
</div>
<div class="header standalone <?= $this->getId(); ?>">
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
<?php elseif (isset($footer)): ?>
<?php else : ?>
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<div class="subject">
	<div class="inset"></div>
	<span class="text"><?= $data['subject']; ?></span>
</div>
<div class="status">
	<div class="inset"></div>
	<span class="text"><?= $data['status']; ?></span>
</div>
<div class="progress">
	<div class="inset"></div>
	<div class="bar round" style="width:<?= $data['percent']; ?>%;background-color:<?= $data['progress_color']; ?>">
		<div class="outset round"></div>
		<span class="text"><?= $data['percent']; ?>%</span>
	</div>
</div>
<div class="updated">
	<div class="inset round" style="background-color:<?= $data['updated_color']; ?>;"></div>
	<span class="text"><?= $data['updated_on']; ?></span>
</div>
<?php //if (isset($data['childs'])): ?>
<?php //$this->forward('subprojects/render', false); ?>
<?php //endif; ?>
<?php endif; ?>

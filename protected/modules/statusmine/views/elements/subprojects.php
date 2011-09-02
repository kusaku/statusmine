<?php if (isset($header)): ?>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<div class="header standalone">
    <div class="subprojects">
        <span class="text">Подпрокты</span>
    </div>
</div>  
<?php unset($_SERVER['HTTP_X_REQUESTED_WITH']); ?>
<?php foreach ($data['childs'] as $_GET['id']): ?>
<?php $this->forward('project/render', false); ?>
<?php endforeach; ?>
<?php unset($_GET['id']); ?>
<?php endif; ?>
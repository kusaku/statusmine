<?php if (isset($header)): ?>
<div class="header standalone">
	<div class="<?= $this->getId(); ?>">
		<span class="text">Участники</span>
	</div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<?php foreach ($data as $user): ?>
<div class="gravatar">
	<div class="outershadow"></div>
	<img src="https://secure.gravatar.com/avatar/<?= (string)@$user['gravatar']; ?>"/>
</div>
<?php endforeach; ?>
<?php endif; ?>

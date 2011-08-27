<?php foreach ($data as $user): ?>
<div class="gravatar">
	<div class="outerglow full"></div>
	<img src="https://secure.gravatar.com/avatar/<?= (string)@$user['gravatar']; ?>"/>
</div>
<?php endforeach; ?>
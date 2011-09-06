<?php if (isset($header)): ?>
<?php elseif (isset($footer)): ?>
<?php else : ?>
<?php if ($data['preloader']): ?>
<div class="outer">
	<div class="preloader">
		<div class="inset"></div>
		<span class="text">statusmine is loading...</span>
	</div>
</div>
<?php else : ?>
<div class="outer">
	<div class="left">
		<div class="content">
			<?php $this->forward('projects/render', false); ?>
		</div>
	</div>
	<div class="right">
		<div class="content">
			<?php $this->forward('calendar/render', false); ?>
			<?php $this->forward('messages/render', false); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php endif; ?>
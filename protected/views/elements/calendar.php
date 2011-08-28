<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="<?= $this->getId(); ?>">
        <span class="text">Календарь</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<div class="time">
	22<span>:</span>22
</div>
<div class="date">чт, 7 апреля 1983</div>
<div class="innershadow full"></div>
<?php endif; ?>
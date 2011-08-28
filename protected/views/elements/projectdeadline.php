<?php if (isset($header)): ?>
<div class="header standalone">
    <div class="projectdeadline">
        <span class="text">Dead Line</span>
    </div>
</div>
<?php elseif (isset($footer)): ?>
<?php else: ?>
<div class="inset full round" style="background-color:<?= (string)@$data['color']; ?>;"></div>
<span class="text"><?= (string)@$data['date']; ?></span>
<?php endif; ?>
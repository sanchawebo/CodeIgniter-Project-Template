<?php

/**
 * @var string $subject
 * @var array  $logs
 */
helper('text');
?>

<h1><?= $subject ?></h1>
<hr>

<?php foreach ($logs as $log) : ?>
    <?php $counter = 0; ?>
    <div style="padding: 8px 16px; margin-bottom: 12px;">
        <?php foreach ($log->lines as $line) : ?>
            <?php if ($counter === 0) : ?>
                <h3 style="margin: 0;"><?= highlight_code($line); ?></h3>
            <?php else : ?>
                <span style="margin: 0; padding-left: 16px;"><?= highlight_code($line) ?></span>
            <?php endif; ?>
            <?php $counter++; ?>
        <?php endforeach ?>
    </div>
    <hr>
<?php endforeach ?>
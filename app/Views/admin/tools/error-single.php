<?php
/**
 * @var array $log
 */
?>
<?php foreach ($log as $index => $logData): ?>
<div class="p-2 mb-2 language-log">
    <pre>
        <code>
            <?php foreach ($logData->lines as $index => $line): ?>
                <?= $line ?>
            <?php endforeach ?>
        </code>
    </pre>
</div>
<?php endforeach ?>
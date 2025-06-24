<?php
/**
 * @var CodeIgniter\View\View $this
 * @var bool                  $success
 * @var string                $name
 * @var string|null           $message
 * @var array|null            $trace
 */
?>
<div>
    <?php if ($success) : ?>
        <?= frok_notification('success', $name . ' succeded') ?>
    <?php else : ?>
        <?= frok_notification('error', $name . ' failed') ?>
        <p>Message:</p>
        <p class="mb-3"><?= $message ?? '' ?></p>
        <p>Trace:</p>
        <p><?= d($trace) ?></p>
    <?php endif; ?>
</div>
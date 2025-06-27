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
        <div class="alert alert-success" role="alert">
            <?= esc($name) ?> succeeded
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            <?= esc($name) ?> failed
            <?php if (!empty($message)) : ?>
                <div class="mt-2"><strong>Message:</strong> <?= esc($message) ?></div>
            <?php endif; ?>
            <?php if (!empty($trace)) : ?>
                <div class="mt-2"><strong>Trace:</strong>
                    <pre class="mb-0"><?= esc(print_r($trace, true)) ?></pre>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
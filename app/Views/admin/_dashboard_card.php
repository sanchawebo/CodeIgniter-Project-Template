<?php
/**
 * @var string $title
 * @var string $subtitle
 * @var string $text
 * @var string $route
 * @var string $button
 * @var string|null $borderClass
 * @var string|null $btnClass
 */
$borderClass = $borderClass ?? 'border-primary';
$btnClass = $btnClass ?? 'btn-primary';
?>
<div class="card h-100 <?= esc($borderClass) ?>">
    <div class="card-body vstack">
        <?php if (!empty($subtitle)): ?>
            <h6 class="card-subtitle mb-2 text-muted"><?= esc($subtitle) ?></h6>
        <?php endif; ?>
        <h5 class="card-title"><?= esc($title) ?></h5>
        <?php if (!empty($text)): ?>
            <p class="card-text"><?= esc($text) ?></p>
        <?php endif; ?>
        <?php if (!empty($route) && !empty($button)): ?>
            <a href="<?= esc($route) ?>" target="_self" class="mt-auto btn <?= esc($btnClass) ?>"><?= esc($button) ?></a>
        <?php endif; ?>
    </div>
</div>
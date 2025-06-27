<?php

/**
 * @var CodeIgniter\View\View $this
 * @var string|null $prevRoute
 * @var string|null $nextRoute
 * @var string|null $nextBtnName
 * @var string|null $nextBtnValue
 * @var array $steps
 */
?>
<div class="e-container">
    <div class="m-step-indicator">
        <ul class="m-step-indicator__steps">
            <?php foreach ($steps as $step) : ?>
                <li class="m-step-indicator__step <?= esc($step['active']) ? '-active' : '' ?>">
                    <div class="m-step-indicator__node"><?= esc($step['num']) ?></div>
                    <span class="m-step-indicator__label">
                        <?php if (esc($step['active'])): ?>
                            <a href="<?= esc($step['href']) ?>" class="text-primary text-decoration-underline">
                                <?= esc($step['label']) ?>
                            </a>
                        <?php else: ?>
                            <?= esc($step['label']) ?>
                        <?php endif; ?>
                    </span>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="step-indicator__controls d-flex justify-content-between mt-5 mb-3">
        <?php if ($prevRoute !== null): ?>
            <button type="button" class="a-button a-button--secondary -without-icon" hx-get="<?= $prevRoute ?>" hx-push-url="true" hx-target="body">
                <span class="a-button__label"><?= lang('Basic.backBtn') ?></span>
            </button>
        <?php else: ?>
            <div>&nbsp;</div>
        <?php endif; ?>
        <?php if ($nextRoute !== null): ?>
            <button type="submit" class="a-button a-button--primary -without-icon"
                <?= (isset($nextBtnName) ? ' name="' . $nextBtnName . '" ' : '') ?>
                <?= (isset($nextBtnValue) ? ' value="' . $nextBtnValue . '"' : '') ?>>
                <span class="a-button__label"><?= lang('Basic.continueBtn') ?></span>
            </button>
        <?php else: ?>
            <div>&nbsp;</div>
        <?php endif; ?>
    </div>
</div>
<?php
/**
 * @var array $languages
 */
?>
<li class="nav-item dropdown px-2">
    <a role="button" class="nav-link dropdown-toggle"
        data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false" href="#">
        <i class="fa-solid fa-globe" title="<?= lang('Basic.langSwitcher.open') ?>"></i>
    </a>
    <ul class="dropdown-menu position-absolute">
        <li>
            <span class="dropdown-item-text fw-bold"><?= lang('Basic.langSwitcher.availableLangs') ?></span>
        </li>
        <?php foreach ($languages as $lang): ?>
            <li>
                <a href="<?= route_to('change-lang', $lang['lang_code']) ?>"
                    class="dropdown-item">
                    <?= $lang['display_name'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</li>
<?php

/**
 * @var Michalsn\CodeIgniterHtmx\View\View $this
 */
?>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasSidebarLabel"><?= lang('Basic.siteTitle') ?></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="<?= lang('Basic.close') ?>"></button>
    </div>
    <div class="offcanvas-body vstack gap-4">
        <ul class="list-group list-group-flush" role="menubar">
            <a href="<?= route_to('dashboard') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('dashboard', true) ?>">
                <i class="fa-solid fa-gauge me-2" title="<?= lang('Basic.menu.dashboard') ?>"></i>
                <?= lang('Basic.menu.dashboard') ?>
            </a>
        </ul>
        <?php if (auth()->user()?->can('admin.access')): ?>
            <ul class="list-group list-group-flush" role="menubar">
                <a href="<?= route_to('admin-dashboard') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('admin-dashboard', true) ?>">
                    <i class="fa-solid fa-user-tie me-2" title="<?= lang('Basic.menu.admin') ?>"></i>
                    <?= lang('Basic.menu.admin') ?>
                </a>
            </ul>
        <?php endif; ?>
        <ul class="list-group list-group-flush mt-auto" role="menubar">
            <a href="<?= route_to('logout') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action">
                <i class="fa-solid fa-arrow-right-from-bracket me-2" title="<?= lang('Basic.menu.logout') ?>"></i>
                <?= lang('Basic.menu.logout') ?>
            </a>
        </ul>
    </div>
</div>
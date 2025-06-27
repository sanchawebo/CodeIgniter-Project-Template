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
            <a href="<?= route_to('admin-dashboard') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('admin-dashboard', true) ?>">
                <i class="fa-solid fa-user-tie me-2" title="<?= lang('Basic.menu.admin') ?>"></i>
                <?= lang('Basic.menu.admin') ?>
            </a>
        </ul>
        <ul class="list-group list-group-flush" role="menubar">
            <?php if (auth()->user()->can('users.list')): ?>
                <a href="<?= route_to('user-list') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isPartialUriSelected('user-list', true, 'UserController::activateShow') ?>">
                    <i class="fa-solid fa-users me-2" title="<?= lang('Admin.sidebar.users.list') ?>"></i>
                    <?= lang('Admin.sidebar.users.list') ?>
                </a>
            <?php endif; ?>
            <?php if (auth()->user()->can('users.activate')): ?>
                <a href="<?= route_to('UserController::activateShow') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('UserController::activateShow') ?>">
                    <i class="fa-solid fa-user-check me-2" title="<?= lang('Admin.sidebar.users.activate') ?>"></i>
                    <?= lang('Admin.sidebar.users.activate') ?>
                </a>
            <?php endif; ?>
        </ul>
        <ul class="list-group list-group-flush" role="menubar">
            <?php if (auth()->user()->can('admin.settings')): ?>
                <a href="<?= route_to('general-settings') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('general-settings') ?>">
                    <i class="fa-solid fa-gear me-2" title="<?= lang('Settings.title') ?>"></i>
                    <?= lang('Settings.title') ?>
                </a>
            <?php endif; ?>
            <?php if (auth()->user()->can('admin.errors')): ?>
                <a href="<?= route_to('error-logs') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('error-logs') ?>">
                    <i class="fa-solid fa-triangle-exclamation me-2" title="<?= lang('Admin.sidebar.error-logs') ?>"></i>
                    <?= lang('Admin.sidebar.error-logs') ?>
                </a>
            <?php endif; ?>
            <?php if (auth()->user()->can('admin.db')): ?>
                <a href="<?= route_to('migration') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('migration') ?>">
                    <i class="fa-solid fa-database me-2" title="<?= lang('Admin.sidebar.migrations') ?>"></i>
                    <?= lang('Admin.sidebar.migrations') ?>
                </a>
                <a href="<?= route_to('seeding') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('seeding') ?>">
                    <i class="fa-solid fa-seedling me-2" title="<?= lang('Admin.sidebar.seeding') ?>"></i>
                    <?= lang('Admin.sidebar.seeding') ?>
                </a>
            <?php endif; ?>
            <?php if (auth()->user()->can('admin.testing')): ?>
                <a href="<?= route_to('test') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action <?= isExactUriSelected('test') ?>">
                    <i class="fa-solid fa-vial me-2" title="<?= lang('Admin.sidebar.test') ?>"></i>
                    <?= lang('Admin.sidebar.test') ?>
                </a>
            <?php endif; ?>
        </ul>
        <ul class="list-group list-group-flush mt-auto" role="menubar">
            <a href="<?= route_to('dashboard') ?>" hx-boost="false" role="menuitem" class="list-group-item list-group-item-action">
                <i class="fa-solid fa-arrow-left me-2" title="<?= lang('Admin.sidebar.back') ?>"></i>
                <?= lang('Admin.sidebar.back') ?>
            </a>
        </ul>
    </div>
</div>
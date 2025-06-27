<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('Admin.dashboard.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Admin.dashboard.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<?php if (auth()->user()->can('admin.settings')): ?>
    <div class="row pb-4">
        <div class="col">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <h5 class="card-title"><?= lang('Settings.title') ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= lang('Settings.title') ?></h6>
                    <p class="card-text"><?= lang('Settings.desc') ?></p>
                    <a href="<?= route_to('general-settings') ?>" target="_self" class="btn btn-primary"><?= lang('Settings.title') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (auth()->user()->can('users.list', 'users.activate')): ?>
    <div class="row pb-6">
    <?php if (auth()->user()->can('users.list')): ?>
        <div class="col">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <h5 class="card-title"><?= lang('Admin.sidebar.users.list') ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= lang('Admin.sidebar.users.group') ?></h6>
                    <p class="card-text"><?= lang('Admin.users.desc') ?></p>
                    <a href="<?= route_to('user-list') ?>" target="_self" class="btn btn-primary"><?= lang('Admin.sidebar.users.list') ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (auth()->user()->can('users.activate')): ?>
        <div class="col">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <h5 class="card-title"><?= lang('Admin.sidebar.users.activate') ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= lang('Admin.sidebar.users.group') ?></h6>
                    <p class="card-text"><?= lang('Admin.usersActivate.desc') ?></p>
                    <a href="<?= route_to('UserController::activateShow') ?>" target="_self" class="btn btn-primary"><?= lang('Admin.sidebar.users.activate') ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (auth()->user()->can('admin.errors', 'admin.db')): ?>
    <div class="row pb-6">
    <?php if (auth()->user()->can('admin.errors')): ?>
        <div class="col">
            <div class="card h-100 border-purple">
                <div class="card-body">
                    <h5 class="card-title"><?= lang('Admin.sidebar.error-logs') ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= lang('Admin.adminTools') ?></h6>
                    <p class="card-text"><?= lang('Admin.error-logs.desc') ?></p>
                    <a href="<?= route_to('error-logs') ?>" target="_self" class="btn btn-secondary"><?= lang('Admin.sidebar.error-logs') ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.db')): ?>
        <div class="col">
            <div class="card h-100 border-purple">
                <div class="card-body">
                    <h5 class="card-title"><?= lang('Admin.sidebar.migrations') ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= lang('Admin.adminTools') ?></h6>
                    <p class="card-text"><?= lang('Admin.migrations.desc') ?></p>
                    <a href="<?= route_to('migration') ?>" target="_self" class="btn btn-secondary"><?= lang('Admin.sidebar.migrations') ?></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-purple">
                <div class="card-body">
                    <h5 class="card-title"><?= lang('Admin.sidebar.seeding') ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= lang('Admin.adminTools') ?></h6>
                    <p class="card-text"><?= lang('Admin.seeding.desc') ?></p>
                    <a href="<?= route_to('seeding') ?>" target="_self" class="btn btn-secondary"><?= lang('Admin.sidebar.seeding') ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
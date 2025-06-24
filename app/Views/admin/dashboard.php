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

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<?php if (auth()->user()->can('admin.settings')): ?>
    <div class="row pb-4">
        <div class="col">
            <?= frok_tile([
                'style'      => 'blue',
                'href'       => route_to('general-settings'),
                'hrefTarget' => '_self',
                'tagline'    => lang('Settings.title'),
                'headline'   => lang('Settings.title'),
                'subline'    => lang('Settings.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
    </div>
<?php endif; ?>
<?php if (auth()->user()->can('users.list', 'users.activate')): ?>
    <div class="row pb-6">
    <?php if (auth()->user()->can('users.list')): ?>
        <div class="col">
            <?= frok_tile([
                'style'      => 'blue',
                'href'       => route_to('user-list'),
                'hrefTarget' => '_self',
                'tagline'    => lang('Admin.sidebar.users.group'),
                'headline'   => lang('Admin.sidebar.users.list'),
                'subline'    => lang('Admin.users.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
    <?php endif; ?>
    <?php if (auth()->user()->can('users.activate')): ?>
        <div class="col">
            <?= frok_tile([
                'style'      => 'blue',
                'href'       => route_to('UserController::activateShow'),
                'hrefTarget' => '_self',
                'tagline'    => lang('Admin.sidebar.users.group'),
                'headline'   => lang('Admin.sidebar.users.activate'),
                'subline'    => lang('Admin.usersActivate.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>
<?php if (auth()->user()->can('admin.feedback')): ?>
    <div class="row pb-6">
        <div class="col">
            <?= frok_tile([
                'style'      => 'turquoise',
                'href'       => route_to('admin-feedback'),
                'hrefTarget' => '_self',
                'tagline'    => lang('Admin.sidebar.feedback'),
                'headline'   => lang('Admin.sidebar.feedback'),
                'subline'    => lang('Admin.feedback.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
    </div>
<?php endif; ?>
<?php if (auth()->user()->can('admin.errors', 'admin.db')): ?>
    <div class="row pb-6">
    <?php if (auth()->user()->can('admin.errors')): ?>
        <div class="col">
            <?= frok_tile([
                'style'      => 'purple',
                'href'       => route_to('error-logs'),
                'hrefTarget' => '_self',
                'tagline'    => lang('Admin.adminTools'),
                'headline'   => lang('Admin.sidebar.error-logs'),
                'subline'    => lang('Admin.error-logs.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.db')): ?>
        <div class="col">
            <?= frok_tile([
                'style'      => 'purple',
                'href'       => route_to('migration'),
                'hrefTarget' => '_self',
                'tagline'    => lang('Admin.adminTools'),
                'headline'   => lang('Admin.sidebar.migrations'),
                'subline'    => lang('Admin.migrations.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
        <div class="col">
            <?= frok_tile([
                'style'      => 'purple',
                'href'       => route_to('seeding'),
                'hrefTarget' => '_self',
                'tagline'    => lang('Admin.adminTools'),
                'headline'   => lang('Admin.sidebar.seeding'),
                'subline'    => lang('Admin.seeding.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
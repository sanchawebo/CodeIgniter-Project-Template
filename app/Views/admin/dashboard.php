<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.dashboard.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('ScpAdmin.dashboard.title') ?>
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
                'tagline'    => lang('ScpAdmin.sidebar.users.group'),
                'headline'   => lang('ScpAdmin.sidebar.users.list'),
                'subline'    => lang('ScpAdmin.users.desc'),
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
                'tagline'    => lang('ScpAdmin.sidebar.users.group'),
                'headline'   => lang('ScpAdmin.sidebar.users.activate'),
                'subline'    => lang('ScpAdmin.usersActivate.desc'),
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
                'tagline'    => lang('ScpAdmin.sidebar.feedback'),
                'headline'   => lang('ScpAdmin.sidebar.feedback'),
                'subline'    => lang('ScpAdmin.feedback.desc'),
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
                'tagline'    => lang('ScpAdmin.adminTools'),
                'headline'   => lang('ScpAdmin.sidebar.error-logs'),
                'subline'    => lang('ScpAdmin.error-logs.desc'),
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
                'tagline'    => lang('ScpAdmin.adminTools'),
                'headline'   => lang('ScpAdmin.sidebar.migrations'),
                'subline'    => lang('ScpAdmin.migrations.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
        <div class="col">
            <?= frok_tile([
                'style'      => 'purple',
                'href'       => route_to('seeding'),
                'hrefTarget' => '_self',
                'tagline'    => lang('ScpAdmin.adminTools'),
                'headline'   => lang('ScpAdmin.sidebar.seeding'),
                'subline'    => lang('ScpAdmin.seeding.desc'),
                'classes'    => 'h-100',
            ]) ?>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
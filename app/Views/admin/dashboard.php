<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?php $this->section('title') ?>
<?= lang('Admin.dashboard.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<?php if (auth()->user()->can('admin.settings')): ?>
    <div class="row pb-4">
        <div class="col">
            <?= view('admin/_dashboard_card', [
                'title'      => lang('Settings.title'),
                'subtitle'   => lang('Settings.title'),
                'text'       => lang('Settings.desc'),
                'route'      => route_to('general-settings'),
                'button'     => lang('Settings.title'),
                'borderClass'=> 'border-primary',
                'btnClass'   => 'btn-primary',
            ]) ?>
        </div>
    </div>
<?php endif; ?>

<?php if (auth()->user()->can('users.list', 'users.activate')): ?>
    <div class="row pb-6">
    <?php if (auth()->user()->can('users.list')): ?>
        <div class="col">
            <?= view('admin/_dashboard_card', [
                'title'      => lang('Admin.sidebar.users.list'),
                'subtitle'   => lang('Admin.sidebar.users.group'),
                'text'       => lang('Admin.users.desc'),
                'route'      => route_to('user-list'),
                'button'     => lang('Admin.sidebar.users.list'),
                'borderClass'=> 'border-primary',
                'btnClass'   => 'btn-primary',
            ]) ?>
        </div>
    <?php endif; ?>
    <?php if (auth()->user()->can('users.activate')): ?>
        <div class="col">
            <?= view('admin/_dashboard_card', [
                'title'      => lang('Admin.sidebar.users.activate'),
                'subtitle'   => lang('Admin.sidebar.users.group'),
                'text'       => lang('Admin.usersActivate.desc'),
                'route'      => route_to('UserController::activateShow'),
                'button'     => lang('Admin.sidebar.users.activate'),
                'borderClass'=> 'border-primary',
                'btnClass'   => 'btn-primary',
            ]) ?>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (auth()->user()->can('admin.errors', 'admin.db')): ?>
    <div class="row pb-6">
    <?php if (auth()->user()->can('admin.errors')): ?>
        <div class="col">
            <?= view('admin/_dashboard_card', [
                'title'      => lang('Admin.sidebar.error-logs'),
                'subtitle'   => lang('Admin.adminTools'),
                'text'       => lang('Admin.error-logs.desc'),
                'route'      => route_to('error-logs'),
                'button'     => lang('Admin.sidebar.error-logs'),
                'borderClass'=> 'border-purple',
                'btnClass'   => 'btn-secondary',
            ]) ?>
        </div>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.db')): ?>
        <div class="col">
            <?= view('admin/_dashboard_card', [
                'title'      => lang('Admin.sidebar.migrations'),
                'subtitle'   => lang('Admin.adminTools'),
                'text'       => lang('Admin.migrations.desc'),
                'route'      => route_to('migration'),
                'button'     => lang('Admin.sidebar.migrations'),
                'borderClass'=> 'border-purple',
                'btnClass'   => 'btn-secondary',
            ]) ?>
        </div>
        <div class="col">
            <?= view('admin/_dashboard_card', [
                'title'      => lang('Admin.sidebar.seeding'),
                'subtitle'   => lang('Admin.adminTools'),
                'text'       => lang('Admin.seeding.desc'),
                'route'      => route_to('seeding'),
                'button'     => lang('Admin.sidebar.seeding'),
                'borderClass'=> 'border-purple',
                'btnClass'   => 'btn-secondary',
            ]) ?>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
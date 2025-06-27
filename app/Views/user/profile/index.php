<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('Profile.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Profile.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-page'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="px-5 pt-3 pb-4 mb-6">
    <div id="profile-tabs" hx-target="#profile-tabs" hx-swap="innerHTML">
        <?= view('user/profile/tab_settings') ?>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
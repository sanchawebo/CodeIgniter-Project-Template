<?php

/**
 * @var CodeIgniter\View\View $this
 * @var mixed $result
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.api.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
Test Auth
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="e-container">
    <?= ! d($result) ?>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
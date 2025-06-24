<?php

/**
 * @var CodeIgniter\View\View   $this
 * @var CodeIgniter\Pager\Pager $pager
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.feedback.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('ScpAdmin.feedback.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="row mb-5">
    <div id="feedback-table" class="overflow-x-scroll">
        <?= $this->include('admin/feedback/_table') ?>
    </div>

    <div class="mt-5 hstack justify-content-center">
    <?= $pager->links('default', 'custom_full') ?>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
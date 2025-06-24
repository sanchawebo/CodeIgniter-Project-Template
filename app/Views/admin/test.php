<?php
/**
 * @var CodeIgniter\View\View $this
 * @var array $data
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.test.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('ScpAdmin.test.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>

<h2>Test Controller:</h2>

<?= frok_hr() ?>

<pre>
    <?= print_r($data) ?>
</pre>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>

<?php
/**
 * @var CodeIgniter\View\View $this
 * @var array $data
 */
?>

<?php $this->section('title') ?>
<?= lang('Admin.test.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>

<h2>Test Controller:</h2>

<hr>

<pre>
    <?= print_r($data, true) ?>
</pre>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>

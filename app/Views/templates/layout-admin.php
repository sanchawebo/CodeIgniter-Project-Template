<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 */
?>

<?php $this->extend('templates/layout-main'); ?>

<?php $this->section('sidebar') ?>
    <?= $this->include('templates/sidebar-admin') ?>
<?php $this->endSection() ?>
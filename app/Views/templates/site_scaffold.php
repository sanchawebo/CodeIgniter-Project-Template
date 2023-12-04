<?php
/**
 * @var CodeIgniter\View\View $this
 */
// 1. Change the html-title in the title section.
// 2. Insert site code in the main section.
// 3. Write or import specific JS-Code in pageScripts section.
?>
<?= $this->section('title') ?>
<?= ucfirst('@:@') . ' | ' . SITE_NAME ?>
<?= $this->endSection() ?>

<?= $this->extend('templates/layout'); ?>
<?= $this->section('main'); ?>
<?= helper('html'); ?>


<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
<?= $this->endSection() ?>

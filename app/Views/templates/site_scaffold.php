<?php
/**
 * @var CodeIgniter\View\View $this
 */
// 1. Change the html-title in the title section.
// 2. Insert site code in the main section.
// 3. Write or import specific JS-Code in pageScripts section.
?>
<?php $this->section('title') ?>
<?= ucfirst('@:@') . ' | ' . SITE_NAME ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout'); ?>
<?php $this->section('main'); ?>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>

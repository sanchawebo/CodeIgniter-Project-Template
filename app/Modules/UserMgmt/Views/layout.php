<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<?php $this->extend('admin/layout'); ?>

<?php $this->section('pageTitle') ?>
<?php $this->renderSection('title', true) ?>
<?php $this->endSection() ?>

<?php $this->section('title') ?>
<?php $this->renderSection('title') ?>
<?php $this->endSection() ?>

<?php $this->section('main') ?>
<?php $this->renderSection('main') ?>
<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->renderSection('pageScripts') ?>
<?php $this->endSection() ?>

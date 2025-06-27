<?php

use CodeIgniter\View\View;

/**
 * @var View $this
 */
?>

<?php $this->extend('templates/layout-admin'); ?>

<?php $this->section('title') ?>
<?= $this->renderSection('title', true) ?>
<?php $this->endSection() ?>

<?php $this->section('title') ?>
<?= $this->renderSection('title') ?>
<?php $this->endSection() ?>

<?php $this->section('main') ?>
<?= $this->renderSection('main') ?>
<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?= $this->renderSection('pageScripts') ?>
<?php $this->endSection() ?>

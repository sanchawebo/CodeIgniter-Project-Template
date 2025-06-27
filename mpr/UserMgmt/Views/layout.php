<?php

use CodeIgniter\View\View;

/**
 * @var View $this
 */
?>

<?php $this->extend('templates/layout-admin'); ?>

<?php $this->section('title') ?>
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

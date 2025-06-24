<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 * @var string|false $ticketId
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.api.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
Test POST XML
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="e-container">
    <?php $this->fragment('ticketId') ?>
        <p>
            <b>Ticket ID: </b>
            <span id="ticket-id"><?= esc($ticketId ?: '-') ?></span>
        </p>
    <?php $this->endFragment() ?>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
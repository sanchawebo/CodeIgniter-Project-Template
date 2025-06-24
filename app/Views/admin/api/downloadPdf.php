<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.api.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
Test Download PDF
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="-contrast mb-4 p-5"
    hx-get="<?= route_to('PriintApiTestController::postXml') ?>"
    hx-target="#post-xml-wrapper"
    hx-swap="innerHTML"
    >
    <h1 class="-size-l">Post XML</h1>
    <button type="button" class="a-button a-button--secondary -without-icon"
        hx-trigger="click" _="
            on click put 'Loading...' into #post-xml-wrapper
            then put 'Waiting for XML upload...' into #ticket-status-wrapper
            then put 'Waiting for job completion...' into #download-pdf-wrapper
        "
        >
        <span class="a-button__label">Manually trigger event</span>
    </button>
    <p id="post-xml-wrapper"
        hx-get="<?= route_to('PriintApiTestController::postXml') ?>"
        hx-target="#post-xml-wrapper"
        hx-swap="innerHTML"
        hx-trigger="load delay:1s"
        >
        Loading...
    </p>
</div>
<div class="-contrast mb-4 p-5">
    <h1 class="-size-l">Ticket Status</h1>
    <p id="ticket-status-wrapper">
        Waiting for XML upload...
    </p>
</div>
<div class="-contrast mb-4 p-5">
    <h1 class="-size-l">PDF Download</h1>
    <p id="download-pdf-wrapper">
        Waiting for job completion...
    </p>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
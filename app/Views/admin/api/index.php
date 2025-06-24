<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.api.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('ScpAdmin.api.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="e-container">
    <div class="d-flex flex-row justify-content-between mb-3">
        <div class="a-link a-link--button-secondary">
            <a href="<?= route_to('PriintApiTestController::auth') ?>">
                <span>Test Auth</span>
            </a>
        </div>
        <div class="a-link a-link--button-secondary">
            <a href="<?= route_to('PriintApiTestController::postXml') ?>">
                <span>Test POST XML</span>
            </a>
        </div>
        <div class="a-link a-link--button-secondary">
            <a href="<?= route_to('PriintApiTestController::ticketList') ?>">
                <span>Test List of open tickets</span>
            </a>
        </div>
        <div class="a-link a-link--button-secondary">
            <a href="<?= route_to('PriintApiTestController::ticketStatus') ?>">
                <span>Test status of ticket</span>
            </a>
        </div>
        <div class="a-link a-link--button-secondary">
            <a href="<?= route_to('PriintApiTestController::downloadPdf') ?>">
                <span>Test download ticket artifact (PDF)</span>
            </a>
        </div>
    </div>
    <?= frok_hr() ?>
    <div class="d-flex flex-row gap-3 my-3">
        <div class="a-link a-link--button-secondary">
            <a href="<?= route_to('file-priint-pdf', 'lzi4azj7z6ddjgadnwlm2mvi5u.pdf') ?>">
                <span>Download (PDF)</span>
            </a>
        </div>
        <div class="a-link a-link--button-secondary">
            <a href="<?= route_to('file-priint-zip', '2024-04-12_lzi4azj7z6ddjgadnwlm2mvi5u_1.zip') ?>" download>
                <span>Download (ZIP)</span>
            </a>
        </div>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
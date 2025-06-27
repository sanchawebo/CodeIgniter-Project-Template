<?php
/**
 * @var CodeIgniter\View\View $this
 * @var array                 $dates
 * @var array                 $migrationHistory
 * @var array                 $migrations
 * @var string                $pagerLinks
 */
?>

<?php $this->section('title') ?>
<?= lang('Admin.error-logs.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>
<?= link_tag('/assets/css/prism.css') ?>

<?php foreach ($dates as $index => $date): ?>
<div class="accordion mb-3" id="errorLogAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?= $index ?>">
            <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse<?= $index ?>"
                aria-expanded="false"
                aria-controls="collapse<?= $index ?>">
                <span><?= $date ?>&mdash;Log</span>
                <i class="fa fa-chevron-down ms-2"></i>
            </button>
        </h2>
        <div id="collapse<?= $index ?>" class="accordion-collapse collapse"
            aria-labelledby="heading<?= $index ?>"
            data-bs-parent="#errorLogAccordion"
            data-log-date="<?= $date ?>"
            data-log-result-loaded="0"
            data-log-get-url="<?= route_to('single-log', $date) ?>">
            <div class="accordion-body p-0 pt-2 pb-1">
                <div data-log-spinner-container>
                    <div class="d-flex justify-content-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div data-log-result-container></div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<div class="d-flex justify-content-center my-5" hx-boost="true"><?= $pagerLinks ?></div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?= script_tag([
    'src' => 'assets/js/prism.js',
]) ?>
<?= script_tag([
    'src'   => 'assets/js/error.logs.js',
    'defer' => null,
]) ?>
<?php $this->endSection() ?>
<!-- Write or import specific JS-Code in the above section. -->
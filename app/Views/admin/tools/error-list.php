<?php
/**
 * @var CodeIgniter\View\View $this
 * @var array                 $dates
 * @var array                 $migrationHistory
 * @var array                 $migrations
 * @var string                $pagerLinks
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('Admin.error-logs.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Admin.error-logs.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>
<?= link_tag('/assets/css/prism.css') ?>

<?php foreach ($dates as $index => $date): ?>
<div class="a-accordion" id="errorLogAccordion">
    <div class="a-accordion__headline"
        id="collapse<?= $index ?>"
        data-log-date="<?= $date ?>" data-log-result-loaded="0"
        data-log-get-url="<?= route_to('single-log', $date) ?>">
        <h2 class="a-accordion__headline-heading highlight" id="heading<?= $index ?>">
            <?= $date ?>&mdash;Log
        </h2>
        <button class="a-accordion__headline-button" type="button"
            aria-expanded="false"
            aria-controls="collapse<?= $index ?>">
            <i class="a-icon a-accordion__headline-icon boschicon-bosch-ic-down"
                title="arrow down"
            ></i>
        </button>
    </div>
    <div class="a-accordion__content"
        role="region"
        aria-labelledby="heading<?= $index ?>">
        <div class="accordion-body p-0 pt-2 pb-1">
            <div data-log-spinner-container>
                <div class="d-flex justify-content-center p-4">
                    <?= frok_activity_indicator() ?>
                </div>
            </div>
            <div data-log-result-container></div>

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
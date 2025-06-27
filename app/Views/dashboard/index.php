<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 * @var array                               $manual
 * @var array                               $excel
 * @var array                               $reuse
 */

?>

<?php $this->section('title') ?>
<?= lang('Dashboard.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-page'); ?>
<?php $this->section('main'); ?>

<div hx-boost="true" hx-push-url="true">
    <div class="mb-3">
        <div class="row row-cols-1 row-cols-md-2 g-5">
            <div>
                <div class="bg-primary-subtle p-5">
                    <h1><?= lang('Dashboard.welcomeHead', [auth()->user()->first_name ?? 'Person', auth()->user()->last_name ?? 'Doe']) ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <?= $this->include('welcome_message') ?>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
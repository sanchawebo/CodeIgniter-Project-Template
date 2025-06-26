<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 * @var array                               $manual
 * @var array                               $excel
 * @var array                               $reuse
 */

?>
<?php $this->section('pageTitle') ?>
<?= lang('Dashboard.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Dashboard.pageTitle') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout'); ?>
<?php $this->section('main'); ?>

<div class="container" hx-boost="true" hx-push-url="true">
    <div class="mb-6">
        <div class="row row-cols-1 row-cols-md-2 g-5">
            <div>
                <div class="a-text -primary p-5">
                    <h1><?= lang('Dashboard.welcomeHead', [auth()->user()->first_name ?? 'Person', auth()->user()->last_name ?? 'Doe']) ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5 mb-6">
        <?= $this->include('welcome_message') ?>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
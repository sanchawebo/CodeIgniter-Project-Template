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
<?= lang('Dashboard.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="e-container" hx-boost="true" hx-push-url="true">
    <div class="mb-6">
        <div class="row row-cols-1 row-cols-md-2 g-5">
            <div>
                <div class="a-text -primary p-5">
                    <h1><?= lang('Dashboard.welcomeHead', [auth()->user()->first_name ?? 'Person', auth()->user()->last_name ?? 'Doe']) ?></h1>
                    <p><?= lang('Dashboard.welcomeText') ?></p>
                </div>
            </div>
            <div>
                <?= frok_tile([
                    'style' => 'blue',
                    'href' => route_to('feedback-new'),
                    'tagline' => lang('Dashboard.feedbackSection.tagline'),
                    'headline' => lang('Dashboard.feedbackSection.headline'),
                    'subline' => lang('Dashboard.feedbackSection.subline'),
                    'classes' => 'h-100',
                ]) ?>
            </div>
        </div>
    </div>
    <div class="-primary p-5 mb-6">
        <h2 class="mt-0 mb-4"><?= lang('Dashboard.catalogueSection.headline') ?></h2>
        <div class="row row-cols-1 row-cols-md-3 g-5">
            <?= view('dashboard/tile', [
                'routeTo'           => $manual['routeTo'],
                'imgName'           => $manual['imgName'],
                'partialLangString' => $manual['partialLangString'],
                'steps'             => $manual['steps'] ?? null,
            ], ['saveData' => false]) ?>
            <?= view('dashboard/tile', [
                'routeTo'           => $excel['routeTo'],
                'imgName'           => $excel['imgName'],
                'partialLangString' => $excel['partialLangString'],
                'steps'             => $excel['steps'] ?? null,
            ], ['saveData' => false]) ?>
            <?= view('dashboard/tile', [
                'routeTo'           => $reuse['routeTo'],
                'imgName'           => $reuse['imgName'],
                'partialLangString' => $reuse['partialLangString'],
                'steps'             => $reuse['steps'] ?? null,
            ], ['saveData' => false]) ?>
        </div>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
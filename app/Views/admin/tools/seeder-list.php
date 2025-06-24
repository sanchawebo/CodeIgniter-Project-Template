<?php
/**
 * @var CodeIgniter\View\View $this
 * @var string                $breadcrumbs
 * @var array                 $files
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('Admin.seeding.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Admin.seeding.title') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div>
    <?= frok_notification('warning', 'Be careful when running seeders. Backup db-data if unsure!') ?>
    <h1 class="fs-3">Seed Results:</h1>
    <p id="seed-results">
        None
    </p>
    <?= frok_hr() ?>
    <h1 class="fs-4">Seeder Files:</h1>
    
    <ol class="a-list a-list--num">
        <?php foreach ($files as $file) : ?>
        <li class="d-flex align-items-center fs-4">
            <div class="ms-3">
                <p class="fs-6 mb-0 text-secondary">Last modified:
                    <?= date('d.m.Y, H:i', $file['modifiedDate']) ?>
                </p>
                <span><?= $file['fileName'] ?></span>
            </div>
            <button hx-get="<?= route_to('seed-single', $file['className']) ?>" hx-target="#seed-results"
                _="on click set #seed-results.innerHTML to 'Loading...'"
                class="a-button a-button--primary -without-icon ms-auto">
                <span class="a-button__label">Run Seeder</span>
            </button>
        </li>
        <?php endforeach ?>
    </ol>
</div>
<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
<!-- Write or import specific JS-Code in the above section. -->
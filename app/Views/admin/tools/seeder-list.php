<?php
/**
 * @var CodeIgniter\View\View $this
 * @var string                $breadcrumbs
 * @var array                 $files
 */
?>

<?php $this->section('title') ?>
<?= lang('Admin.seeding.title') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <div>
            Be careful when running seeders. Backup db-data if unsure!
        </div>
    </div>
    <h1 class="fs-3">Seed Results:</h1>
    <p id="seed-results">
        None
    </p>
    <hr>
    <h1 class="fs-4">Seeder Files:</h1>
    
    <ol class="list-group list-group-numbered">
        <?php foreach ($files as $file) : ?>
        <li class="list-group-item d-flex align-items-center fs-4">
            <div class="ms-3">
                <p class="fs-6 mb-0 text-secondary">
                    <i class="far fa-clock me-1"></i>
                    Last modified: <?= date('d.m.Y, H:i', $file['modifiedDate']) ?>
                </p>
                <span><?= $file['fileName'] ?></span>
            </div>
            <button hx-get="<?= route_to('seed-single', $file['className']) ?>" hx-target="#seed-results"
                _="on click set #seed-results.innerHTML to 'Loading...'"
                class="btn btn-primary ms-auto">
                <i class="fas fa-play me-1"></i>
                <span>Run Seeder</span>
            </button>
        </li>
        <?php endforeach ?>
    </ol>
</div>
<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
<!-- Write or import specific JS-Code in the above section. -->
<?php
/**
 * @var CodeIgniter\View\View $this
 * @var array $langMap
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('Admin.language.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Admin.language.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>

<div class="container">
    <div class="d-flex flex-row mb-5">
        <div class="a-link a-link--button-secondary">
            <a href="<?= base_url(route_to('lang-export')) ?>">
                <span>Excel-Export Languages</span>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php foreach ($langMap as $lang => $files): ?>
            <div class="col">
                <h2 class="-size-xl"><?= strtoupper($lang) ?></h2>
                <ul>
                    <?php foreach ($files as $file): ?>
                        <li><?= basename($file, '.php') ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>

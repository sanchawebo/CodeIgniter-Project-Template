<?php
/**
 * @var CodeIgniter\View\View $this
 * @var bool                  $success
 * @var array|null            $errors
 */
?>

<?php $this->section('title') ?>
<?= lang('Admin.migrations.title') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div>
    <a href="<?= route_to('migration') ?>" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <hr>

    <h2>Single Migration:</h2>
    <?php if ($success) : ?>
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i> Success
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-times-circle"></i> Failed
        </div>
    <?php endif; ?>
    <?php if (isset($errors)) : ?>
        <div class="alert alert-warning" role="alert">
            <pre><?= print_r($errors, true) ?></pre>
        </div>
    <?php endif; ?>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
<!-- Write or import specific JS-Code in the above section. -->
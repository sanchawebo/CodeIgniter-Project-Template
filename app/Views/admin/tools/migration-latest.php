<?php
/**
 * @var CodeIgniter\View\View $this
 * @var bool                  $success
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.migrations.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('ScpAdmin.migrations.title') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div>
    <?= frok_link(route_to('migration'), 'Back', 'boschicon-bosch-ic-arrow-left', true, true) ?>
    <?= frok_hr() ?>

    <h2>Latest Migrations:</h2>
    <?php if ($success) : ?>
        <?= frok_notification('success', 'Success') ?>
    <?php else : ?>
        <?= frok_notification('error', 'Failed') ?>
    <?php endif; ?>
    <?php if (isset($errors)) : ?>
        <p><?= d($errors) ?></p>
    <?php endif; ?>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
<!-- Write or import specific JS-Code in the above section. -->
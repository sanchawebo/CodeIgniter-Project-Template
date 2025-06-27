<?php

use CodeIgniter\View\View;

/**
 * @var View $this
 */
?>
<?php $this->section('title') ?>
<?= lang('Users.list') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>

<div class="row align-items-center">
    <div class="col">
        <?= $this->include('Mpr\UserMgmt\Views\_search') ?>
    </div>
    <?php if (auth()->user()->can('users.create')): ?>
        <div class="col-auto">
            <a href="<?= url_to('user-new') ?>" class="btn btn-secondary">
                <i class="fa fa-plus me-2"></i>
                <span><?= lang('Users.newUser') ?></span>
            </a>
        </div>
    <?php endif ?>
</div>
<div class="row">
    <div id="users-table"><?= $this->include('Mpr\UserMgmt\Views\_table') ?></div>
</div>
<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
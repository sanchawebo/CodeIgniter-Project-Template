<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('Profile.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Profile.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="e-container">
    <div class="-primary px-5 pt-3 pb-4 mb-6">
        <div id="profile-tabs" hx-target="#profile-tabs" hx-swap="innerHTML">
            <?php if (isset($selectTab)): ?>
                <?php if ($selectTab === 'address'): ?>
                    <?= view('user/profile/tab_address') ?>
                <?php elseif ($selectTab === 'logo'): ?>
                    <?= view('user/profile/tab_logo') ?>
                <?php endif; ?>
            <?php else: ?>
                <?= view('user/profile/tab_settings') ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
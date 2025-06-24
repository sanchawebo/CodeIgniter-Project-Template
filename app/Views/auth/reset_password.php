<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAuth.resetPassword.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('ScpAuth.resetPassword.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout'); ?>
<?php $this->section('main'); ?>
<?php helper(['html', 'form']); ?>


<div class="e-container">
    <div class="-primary p-5">
        <!-- Password -->
        <?php if (session('password-info')): ?>
            <?= frok_notification('neutral', session('password-info')) ?>
        <?php endif; ?>
        <?php if ($passwordIsSuccess ?? false): ?>
            <?= frok_notification('success', lang('ScpProfile.success')) ?>
        <?php endif; ?>
        <form action="<?= route_to('reset-password-post') ?>" method="post">
            <?= csrf_field_with_wrapper() ?>
            <div class="o-form m-0" id="password-form">
                <h1 class="fs-4 mt-0 mb-4"><?= lang('ScpProfile.settings.passwordHead') ?></h1>
                <div class="m-form-field">
                    <div class="a-text-field a-text-field--password">
                        <label for="password"><?= lang('ScpProfile.settings.passwordNewLabel') ?> *</label>
                        <input type="password" name="password" id="password" required />
                        <button type="button" class="a-text-field__icon-password" >
                            <i class="a-icon ui-ic-watch-on" title="<?= lang('ScpAuth.register.passwordBtn') ?>"></i>
                        </button>
                    </div>
                    <?= validation_show_error('password') ?>
                </div>
                <small id="pw-message">
                    <p><?= lang('ScpAuth.register.passwordHelp') ?></p>
                    <p class="invalid" id="length"><?= lang('ScpAuth.register.passwordCriteria.chars') ?> <b><?= lang('ScpAuth.register.passwordCriteria.charsBold') ?></b></p>
                    <p class="invalid" id="capital"><?= lang('ScpAuth.register.passwordCriteria.upper') ?> <b><?= lang('ScpAuth.register.passwordCriteria.upperBold') ?></b></p>
                    <p class="invalid" id="letter"><?= lang('ScpAuth.register.passwordCriteria.lower') ?> <b><?= lang('ScpAuth.register.passwordCriteria.lowerBold') ?></b></p>
                    <p class="invalid" id="number"><?= lang('ScpAuth.register.passwordCriteria.number') ?> <b><?= lang('ScpAuth.register.passwordCriteria.numberBold') ?></b></p>
                </small>
                <div class="m-form-field">
                    <div class="a-text-field a-text-field--password">
                        <label for="password-confirm"><?= lang('ScpProfile.settings.passwordNewConfirmLabel') ?> *</label>
                        <input type="password" name="password_confirm" id="password-confirm" required />
                        <button type="button" class="a-text-field__icon-password">
                            <i class="a-icon ui-ic-watch-on" title="<?= lang('ScpAuth.register.passwordBtn') ?>"></i>
                        </button>
                    </div>
                    <?= validation_show_error('password_confirm') ?>
                </div>
                <small id="pw-confirm-message">
                    <p class="invalid" id="match"><?= lang('ScpAuth.register.passwordCriteria.match') ?></p>
                </small>
                <button type="submit" class="a-button a-button--primary -without-icon mb-0">
                    <span class="a-button__label"><?= lang('ScpProfile.settings.saveBtn') ?></span>
                </button>
            </div>
        </form>
    </div>
</div>

<?= script_tag('/assets/js/password.js') ?>


<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
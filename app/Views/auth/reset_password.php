<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('Auth.resetPassword.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Auth.resetPassword.title') ?>
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
            <?= frok_notification('success', lang('Profile.success')) ?>
        <?php endif; ?>
        <form action="<?= route_to('reset-password-post') ?>" method="post">
            <?= csrf_field_with_wrapper() ?>
            <div class="o-form m-0" id="password-form">
                <h1 class="fs-4 mt-0 mb-4"><?= lang('Profile.settings.passwordHead') ?></h1>
                <div class="m-form-field">
                    <div class="a-text-field a-text-field--password">
                        <label for="password"><?= lang('Profile.settings.passwordNewLabel') ?> *</label>
                        <input type="password" name="password" id="password" required />
                        <button type="button" class="a-text-field__icon-password" >
                            <i class="a-icon ui-ic-watch-on" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                        </button>
                    </div>
                    <?= validation_show_error('password') ?>
                </div>
                <small id="pw-message">
                    <p><?= lang('Auth.register.passwordHelp') ?></p>
                    <p class="invalid" id="length"><?= lang('Auth.register.passwordCriteria.chars') ?> <b><?= lang('Auth.register.passwordCriteria.charsBold') ?></b></p>
                    <p class="invalid" id="capital"><?= lang('Auth.register.passwordCriteria.upper') ?> <b><?= lang('Auth.register.passwordCriteria.upperBold') ?></b></p>
                    <p class="invalid" id="letter"><?= lang('Auth.register.passwordCriteria.lower') ?> <b><?= lang('Auth.register.passwordCriteria.lowerBold') ?></b></p>
                    <p class="invalid" id="number"><?= lang('Auth.register.passwordCriteria.number') ?> <b><?= lang('Auth.register.passwordCriteria.numberBold') ?></b></p>
                </small>
                <div class="m-form-field">
                    <div class="a-text-field a-text-field--password">
                        <label for="password-confirm"><?= lang('Profile.settings.passwordNewConfirmLabel') ?> *</label>
                        <input type="password" name="password_confirm" id="password-confirm" required />
                        <button type="button" class="a-text-field__icon-password">
                            <i class="a-icon ui-ic-watch-on" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                        </button>
                    </div>
                    <?= validation_show_error('password_confirm') ?>
                </div>
                <small id="pw-confirm-message">
                    <p class="invalid" id="match"><?= lang('Auth.register.passwordCriteria.match') ?></p>
                </small>
                <button type="submit" class="a-button a-button--primary -without-icon mb-0">
                    <span class="a-button__label"><?= lang('Profile.settings.saveBtn') ?></span>
                </button>
            </div>
        </form>
    </div>
</div>

<?= script_tag('/assets/js/password.js') ?>


<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
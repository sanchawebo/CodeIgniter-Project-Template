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

<?php $this->extend('templates/layout-page'); ?>
<?php $this->section('main'); ?>
<?php helper(['html', 'form']); ?>


<div class="container">
    <div class="card p-5 my-5">
        <!-- Password -->
        <?php if (session('password-info')): ?>
            <div class="alert alert-info" role="alert">
                <?= esc(session('password-info')) ?>
            </div>
        <?php endif; ?>
        <?php if ($passwordIsSuccess ?? false): ?>
            <div class="alert alert-success" role="alert">
                <?= esc(lang('Profile.success')) ?>
            </div>
        <?php endif; ?>
        <form action="<?= route_to('reset-password-post') ?>" method="post">
            <?= csrf_field_with_wrapper() ?>
            <div class="mb-0" id="password-form">
                <h1 class="fs-4 mt-0 mb-4"><?= lang('Profile.settings.passwordHead') ?></h1>
                <div class="mb-3">
                    <label for="password" class="form-label"><?= lang('Profile.settings.passwordNewLabel') ?> *</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" required />
                        <button type="button" class="btn btn-outline-secondary" tabindex="-1">
                            <i class="fa fa-eye" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                        </button>
                    </div>
                    <div class="form-text text-danger"><?= validation_show_error('password') ?></div>
                </div>
                <small id="pw-message" class="form-text">
                    <p><?= lang('Auth.register.passwordHelp') ?></p>
                    <p class="invalid" id="length"><?= lang('Auth.register.passwordCriteria.chars') ?> <b><?= lang('Auth.register.passwordCriteria.charsBold') ?></b></p>
                    <p class="invalid" id="capital"><?= lang('Auth.register.passwordCriteria.upper') ?> <b><?= lang('Auth.register.passwordCriteria.upperBold') ?></b></p>
                    <p class="invalid" id="letter"><?= lang('Auth.register.passwordCriteria.lower') ?> <b><?= lang('Auth.register.passwordCriteria.lowerBold') ?></b></p>
                    <p class="invalid" id="number"><?= lang('Auth.register.passwordCriteria.number') ?> <b><?= lang('Auth.register.passwordCriteria.numberBold') ?></b></p>
                </small>
                <div class="mb-3 mt-4">
                    <label for="password-confirm" class="form-label"><?= lang('Profile.settings.passwordNewConfirmLabel') ?> *</label>
                    <div class="input-group">
                        <input type="password" name="password_confirm" id="password-confirm" class="form-control" required />
                        <button type="button" class="btn btn-outline-secondary" tabindex="-1">
                            <i class="fa fa-eye" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                        </button>
                    </div>
                    <div class="form-text text-danger"><?= validation_show_error('password_confirm') ?></div>
                </div>
                <small id="pw-confirm-message" class="form-text">
                    <p class="invalid" id="match"><?= lang('Auth.register.passwordCriteria.match') ?></p>
                </small>
                <button type="submit" class="btn btn-primary mt-4 mb-0">
                    <span><?= lang('Profile.settings.saveBtn') ?></span>
                </button>
            </div>
        </form>
    </div>
</div>


<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>
<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 * @var array|null $languageList
 * @var string|null $userLang
 */
helper(['form', 'html']);
?>
<?= $this->include('user/profile/_tabs') ?>
<div class="container">
    <?php $this->fragment('lang-form') ?>
    <form action="<?= route_to('profile-tab-settings-lang') ?>" method="post">
        <?= csrf_field_with_wrapper() ?>
        <div class="mb-4" id="lang-form">
            <h1 class="fs-4"><?= lang('Profile.settings.langHead') ?></h1>
            <div class="mb-3">
                <label for="language" class="form-label"><?= lang('Profile.settings.langLabel') ?></label>
                <?= form_dropdown([
                    'id'           => 'language',
                    'name'         => 'frontend_lang',
                    'aria-label'   => lang('Profile.settings.langLabel'),
                    'options'      => $languageList ?? [],
                    'autocomplete' => 'off',
                    'selected'     => $userLang,
                    'class'        => 'form-select'
                ]) ?>
                <?php if ($error = validation_show_error('language')): ?>
                    <div class="invalid-feedback d-block"><?= $error ?></div>
                <?php endif; ?>
            </div>
            <?php if (session('langIsSuccess') === 'true'): ?>
                <div class="alert alert-success fade show" role="alert" _="on load wait 10s then transition my opacity to 0 then remove me">
                    <?= lang('Profile.success') ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary mb-0">
                <span><?= lang('Profile.settings.saveBtn') ?></span>
            </button>
        </div>
    </form>
    <?php $this->endFragment() ?>
    <hr>
    <!-- Password -->
    <?php if (session('password-info')): ?>
        <div class="alert alert-info fade show" role="alert" _="on load go to the top of me -60px">
            <?= session('password-info') ?>
        </div>
    <?php endif; ?>
    <?php $this->fragment('password-form') ?>
    <form hx-post="<?= route_to('profile-tab-settings-password') ?>" hx-target="this" hx-swap="outerHTML">
        <?= csrf_field_with_wrapper() ?>
        <div class="mb-4" id="password-form">
            <h1 class="fs-4"><?= lang('Profile.settings.passwordHead') ?></h1>
            <div class="mb-3">
                <label for="password-old" class="form-label"><?= lang('Profile.settings.passwordOldLabel') ?> *</label>
                <div class="input-group">
                    <input type="password" name="password_old" id="password-old" class="form-control" required />
                    <button type="button" class="btn btn-outline-secondary" tabindex="-1">
                        <i class="fa fa-eye" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                    </button>
                </div>
                <?php if ($error = validation_show_error('password_old')): ?>
                    <div class="invalid-feedback d-block"><?= $error ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><?= lang('Profile.settings.passwordNewLabel') ?> *</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required />
                    <button type="button" class="btn btn-outline-secondary" tabindex="-1">
                        <i class="fa fa-eye" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                    </button>
                </div>
                <?php if ($error = validation_show_error('password')): ?>
                    <div class="invalid-feedback d-block"><?= $error ?></div>
                <?php endif; ?>
            </div>
            <small id="pw-message" class="form-text text-muted">
                <p><?= lang('Auth.register.passwordHelp') ?></p>
                <p class="invalid" id="length"><?= lang('Auth.register.passwordCriteria.chars') ?> <b><?= lang('Auth.register.passwordCriteria.charsBold') ?></b></p>
                <p class="invalid" id="capital"><?= lang('Auth.register.passwordCriteria.upper') ?> <b><?= lang('Auth.register.passwordCriteria.upperBold') ?></b></p>
                <p class="invalid" id="letter"><?= lang('Auth.register.passwordCriteria.lower') ?> <b><?= lang('Auth.register.passwordCriteria.lowerBold') ?></b></p>
                <p class="invalid" id="number"><?= lang('Auth.register.passwordCriteria.number') ?> <b><?= lang('Auth.register.passwordCriteria.numberBold') ?></b></p>
            </small>
            <div class="mb-3">
                <label for="password-confirm" class="form-label"><?= lang('Profile.settings.passwordNewConfirmLabel') ?> *</label>
                <div class="input-group">
                    <input type="password" name="password_confirm" id="password-confirm" class="form-control" required />
                    <button type="button" class="btn btn-outline-secondary" tabindex="-1">
                        <i class="fa fa-eye" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                    </button>
                </div>
                <?php if ($error = validation_show_error('password_confirm')): ?>
                    <div class="invalid-feedback d-block"><?= $error ?></div>
                <?php endif; ?>
            </div>
            <small id="pw-confirm-message" class="form-text text-muted">
                <p class="invalid" id="match"><?= lang('Auth.register.passwordCriteria.match') ?></p>
            </small>
            <?php if ($passwordIsSuccess ?? false): ?>
                <div class="alert alert-success fade show" role="alert" _="on load wait 10s then transition my opacity to 0 then remove me">
                    <?= lang('Profile.success') ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary mb-0">
                <span><?= lang('Profile.settings.saveBtn') ?></span>
            </button>
        </div>
    </form>
    <?php $this->endFragment() ?>
</div>

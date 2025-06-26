<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 * @var array|null $languageList
 * @var string|null $userLang
 */
helper(['form', 'html']);
?>
<?= $this->include('user/profile/_tabs') ?>
<div class="e-container">
    <?php $this->fragment('lang-form') ?>
    <form action="<?= route_to('profile-tab-settings-lang') ?>" method="post">
        <?= csrf_field_with_wrapper() ?>
        <div class="o-form m-0 my-6" id="lang-form">
            <h1 class="fs-4"><?= lang('Profile.settings.langHead') ?></h1>
            <div class="m-form-field m-form-field--dropdown">
                <div class="a-dropdown">
                    <label for="language"><?= lang('Profile.settings.langLabel') ?></label>
                    <?= form_dropdown([
                        'id'           => 'language',
                        'name'         => 'frontend_lang',
                        'aria-label'   => lang('Profile.settings.langLabel'),
                        'options'      => $languageList ?? [],
                        'autocomplete' => 'off',
                        'selected'     => $userLang,
                    ]) ?>
                </div>
                <?= validation_show_error('language') ?>
            </div>
            <?php if (session('langIsSuccess') === 'true'): ?>
                <div _="on load wait 10s then transition my opacity to 0 then remove me">
                    <?= frok_notification('success', lang('Profile.success')) ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="a-button a-button--primary -without-icon mb-0">
                <span class="a-button__label"><?= lang('Profile.settings.saveBtn') ?></span>
            </button>
        </div>
    </form>
    <?php $this->endFragment() ?>
    <hr>
    <!-- Password -->
    <?php if (session('password-info')): ?>
        <div _="on load go to the top of me -60px"><?= frok_notification('neutral', session('password-info')) ?></div>
    <?php endif; ?>
    <?php $this->fragment('password-form') ?>
    <form hx-post="<?= route_to('profile-tab-settings-password') ?>" hx-target="this" hx-swap="outerHTML">
        <?= csrf_field_with_wrapper() ?>
        <div class="o-form m-0 my-6" id="password-form">
            <h1 class="fs-4"><?= lang('Profile.settings.passwordHead') ?></h1>
            <div class="m-form-field">
                <div class="a-text-field a-text-field--password">
                    <label for="password-old"><?= lang('Profile.settings.passwordOldLabel') ?> *</label>
                    <input type="password" name="password_old" id="password-old" required />
                    <button type="button" class="a-text-field__icon-password">
                        <i class="a-icon ui-ic-watch-on" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                    </button>
                </div>
                <?= validation_show_error('password_old') ?>
            </div>
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
            <?php if ($passwordIsSuccess ?? false): ?>
                <div _="on load wait 10s then transition my opacity to 0 then remove me">
                    <?= frok_notification('success', lang('Profile.success')) ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="a-button a-button--primary -without-icon mb-0">
                <span class="a-button__label"><?= lang('Profile.settings.saveBtn') ?></span>
            </button>
        </div>
    </form>
    <?php $this->endFragment() ?>
</div>

<?= script_tag('/assets/js/password.js') ?>
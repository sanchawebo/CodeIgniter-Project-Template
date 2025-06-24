<?php
/**
 * @var CodeIgniter\View\View $this
 */
helper(['html', 'form']);
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('Auth.register.pageTitle') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-600 mx-auto max-vh-100 p-5 overflow-y-auto -primary">
    <?= frok_link(route_to('login'), lang('Auth.requestAccess.back'), 'boschicon-bosch-ic-arrow-left', true, true) ?>
    <h1 class="text-center -size-2xl"><?= lang('Auth.register.title') ?></h1>
    <div class="o-form m-0">
        <?php if (session('error') !== null) : ?>
            <?= frok_notification('error', session('error')) ?>
        <?php elseif (session('errors') !== null) : ?>
            <?= frok_notification('error', session('errors')) ?>
        <?php endif; ?>
        <form action="<?= url_to('register') ?>" method="post" id="password-form">
            <?= csrf_field() ?>

            <p class="text-center"><?= lang('Auth.register.text') ?></p>
            <!-- Email -->
            <div class="m-form-field">
                <div class="a-text-field">
                    <label for="email"><?= lang('Auth.register.email') ?> *</label>
                    <input type="email" name="email" id="email" autocomplete="email" value="<?= old('email', auth()->user()->email ?? null) ?>" required />
                </div>
            </div>

            <!-- Bosch Email -->
            <div class="m-form-field d-none">
                <div class="a-text-field">
                    <label for="bosch-email"><?= lang('Auth.register.boschEmail') ?> *</label>
                    <input type="email" name="bosch_contact_email" id="bosch-email" value="<?= old('bosch_contact_email') ?? 'dealer@bosch.de' ?>" hidden />
                </div>
            </div>

            <!-- Dealer ID -->
            <div class="m-form-field d-none">
                <div class="a-text-field">
                    <label for="dealer-id"><?= lang('Auth.register.dealerId') ?> *</label>
                    <input type="text" name="dealer_id" id="dealer-id" value="<?= old('dealer_id') ?? '1' ?>" hidden />
                </div>
            </div>

            <!-- Name -->
            <div class="o-form__row">
                <div class="m-form-field -half">
                    <div class="a-text-field">
                        <label for="first-name"><?= lang('Auth.register.firstName') ?> *</label>
                        <input type="text" name="first_name" id="first-name" autocomplete="given-name" value="<?= old('first_name') ?>" required />
                    </div>
                </div>
                <div class="m-form-field -half">
                    <div class="a-text-field">
                        <label for="last-name"><?= lang('Auth.register.lastName') ?> *</label>
                        <input type="text" name="last_name" id="last-name" autocomplete="family-name" value="<?= old('last_name') ?>" required />
                    </div>
                </div>
            </div>

            <!-- Country -->
            <div class="m-form-field m-form-field--dropdown mt-3">
                <div class="a-dropdown">
                    <label for="country"><?= lang('Auth.register.country') ?></label>
                    <?= form_dropdown([
                        'id'           => 'country',
                        'name'         => 'country_code',
                        'aria-label'   => lang('Auth.register.country'),
                        'options'      => $countryList ?? [],
                        'autocomplete' => 'off',
                        'selected'     => old('country_code'),
                    ]) ?>
                </div>
                <?= validation_show_error('country') ?>
            </div>
            <!-- Password -->
            <div class="m-form-field mt-5">
                <div class="a-text-field a-text-field--password">
                    <label for="password"><?= lang('Auth.register.password') ?> *</label>
                    <input type="password" name="password" id="password" required />
                    <button type="button" class="a-text-field__icon-password">
                        <i class="a-icon ui-ic-watch-on" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                    </button>
                </div>
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
                    <label for="password-confirm"><?= lang('Auth.register.passwordConfirm') ?> *</label>
                    <input type="password" name="password_confirm" id="password-confirm" required />
                    <button type="button" class="a-text-field__icon-password">
                        <i class="a-icon ui-ic-watch-on" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                    </button>
                </div>
            </div>
            <small id="pw-confirm-message">
                <p class="invalid" id="match"><?= lang('Auth.register.passwordCriteria.match') ?></p>
            </small>

            <button type="submit" class="a-button a-button--primary -without-icon w-100 mb-0">
                <span class="a-button__label"><?= lang('Auth.register.registerBtn') ?></span>
            </button>

        </form>
    </div>
</div>

<?= script_tag('/assets/js/password.js') ?>

<?php $this->endSection() ?>
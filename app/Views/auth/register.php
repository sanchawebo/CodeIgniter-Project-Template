<?php
/**
 * @var CodeIgniter\View\View $this
 */
helper(['html', 'form']);
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('Auth.register.pageTitle') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-sm mx-auto max-vh-100 p-5 overflow-y-auto border border-secondary text-bg-light rounded">
    <a href="<?= route_to('login') ?>" class="btn btn-link mb-3">
        <i class="fas fa-arrow-left-long me-2"></i><?= lang('Auth.register.back') ?>
    </a>
    <h1 class="text-center"><?= lang('Auth.register.title') ?></h1>
    <?= session_alert('error') ?>
    <form action="<?= url_to('register') ?>" method="post" id="password-form">
        <?= csrf_field() ?>

        <p class="text-center"><?= lang('Auth.register.text') ?></p>
        <!-- Email -->
        <div class="mb-3">
            <label class="form-label" for="email"><?= lang('Auth.register.email') ?> *</label>
            <input class="form-control" type="email" name="email" id="email" autocomplete="email" value="<?= old('email', auth()->user()->email ?? null) ?>" required />
        </div>

        <!-- Name -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first-name" class="form-label"><?= lang('Auth.register.firstName') ?> *</label>
                <input type="text" class="form-control" name="first_name" id="first-name" autocomplete="given-name" value="<?= old('first_name') ?>" required />
            </div>
            <div class="col-md-6 mb-3">
                <label for="last-name" class="form-label"><?= lang('Auth.register.lastName') ?> *</label>
                <input type="text" class="form-control" name="last_name" id="last-name" autocomplete="family-name" value="<?= old('last_name') ?>" required />
            </div>
        </div>

        <!-- Country -->
        <div class="mb-3">
            <label for="country" class="form-label"><?= lang('Auth.register.country') ?></label>
            <select class="form-select" id="country" name="country_code" aria-label="<?= lang('Auth.register.country') ?>" autocomplete="off">
                <option value="" disabled>--</option>
                <?php foreach (($countryList ?? []) as $code => $name): ?>
                    <option value="<?= esc($code) ?>" <?= old('country_code') == $code ? 'selected' : '' ?>>
                        <?= esc($name) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback d-block">
                <?= validation_show_error('country_code') ?>
            </div>
        </div>
        <!-- Password -->
        <div class="mb-3 mt-5">
            <label for="password" class="form-label"><?= lang('Auth.register.password') ?> *</label>
            <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" required />
                <button type="button" class="btn btn-outline-secondary"
                    _="on click
                        toggle between .fa-eye and .fa-eye-slash on <i.fa-solid/> in me
                        toggle [@type=password] on previous <input/>
                    end"
                >
                    <i class="fa-solid fa-eye" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                </button>
            </div>
            <div class="invalid-feedback d-block">
                <?= validation_show_error('password') ?>
            </div>
        </div>
        <small id="pw-message">
            <p><?= lang('Auth.register.passwordHelp') ?></p>
            <p class="invalid" id="length"><?= lang('Auth.register.passwordCriteria.chars') ?> <b><?= lang('Auth.register.passwordCriteria.charsBold') ?></b></p>
            <p class="invalid" id="capital"><?= lang('Auth.register.passwordCriteria.upper') ?> <b><?= lang('Auth.register.passwordCriteria.upperBold') ?></b></p>
            <p class="invalid" id="letter"><?= lang('Auth.register.passwordCriteria.lower') ?> <b><?= lang('Auth.register.passwordCriteria.lowerBold') ?></b></p>
            <p class="invalid" id="number"><?= lang('Auth.register.passwordCriteria.number') ?> <b><?= lang('Auth.register.passwordCriteria.numberBold') ?></b></p>
        </small>
        <div class="mb-3">
            <label for="password-confirm" class="form-label"><?= lang('Auth.register.passwordConfirm') ?> *</label>
            <div class="input-group">
                <input type="password" class="form-control" name="password_confirm" id="password-confirm" required />
                <button type="button" class="btn btn-outline-secondary"
                    _="on click
                        toggle between .fa-eye and .fa-eye-slash on <i.fa-solid/> in me
                        toggle [@type=password] on previous <input/>
                    end"
                >
                    <i class="fa-solid fa-eye" title="<?= lang('Auth.register.passwordBtn') ?>"></i>
                </button>
            </div>
        </div>
        <small id="pw-confirm-message">
            <p class="invalid" id="match"><?= lang('Auth.register.passwordCriteria.match') ?></p>
        </small>

        <button type="submit" class="btn btn-primary w-100 mt-5">
            <?= lang('Auth.register.registerBtn') ?>
        </button>

    </form>
</div>

<?php $this->endSection() ?>
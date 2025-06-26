<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?>
<?= lang('Auth.login.pageTitle') ?>
<?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-sm mx-auto max-vh-100 p-5 overflow-y-auto border border-secondary text-bg-light rounded">
  <h1 class="text-center"><?=lang('Auth.login.title')?></h1>
  <div class="mt-6 mb-0">
    <?= session_alert('error') ?>
    <?= session_alert('message') ?>

    <form action="<?= url_to('login') ?>" method="post">
      <?= csrf_field() ?>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label" for="email"><?= lang('Auth.login.email') ?></label>
        <input class="form-control" type="email" name="email" id="email" autocomplete="email" value="<?= old('email') ?>" required />
      </div>

      <!-- Password -->
      <label class="form-label" for="password"><?= lang('Auth.login.password') ?></label>
      <div class="input-group mb-3">
        <input class="form-control" type="password" name="password" id="password" inputmode="text" autocomplete="current-password" required />
        <button type="button" class="btn btn-outline-secondary"
          _="on click
              toggle between .fa-eye and .fa-eye-slash on <i.fa-solid/> in me
              toggle [@type=password] on previous <input/>
            end
          "
        >
          <i class="fa-solid fa-eye" title="<?= lang('Auth.login.passwordBtn') ?>"></i>
        </button>
      </div>

      <!-- Remember me -->
      <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="remember" name="remember" <?php if (old('remember')) : ?> checked<?php endif; ?>>
          <label class="form-check-label" for="remember">
            <?= lang('Auth.login.rememberMe') ?>
          </label>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn btn-primary w-100 mt-3 mb-4">
        <?= lang('Auth.login.loginBtn') ?>
      </button>

    </form>
    <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
      <p class="text-center"><a href="<?= url_to('magic-link') ?>"><?= lang('Auth.login.forgotPassword') ?></a></p>
    <?php endif; ?>

    <?php if (setting('Auth.allowRegistration')): ?>
      <p class="text-center"><a href="<?= url_to('register') ?>"><?= lang('Auth.login.register') ?></a></p>
    <?php endif; ?>
    <div class="d-flex justify-content-center mt-6">
      <?= view_cell('LangSwitcher/LangDropdownCell') ?>
    </div>
  </div>
</div>

<?php $this->endSection() ?>
<?php

use CodeIgniter\View\View;
use UserMgmt\Entities\User;

/**
 * @var View $this
 * @var User $user
 */
?>
<form
  action="<?= $user->adminLink('/changePassword') ?>"
  method="post">

  <?= csrf_field() ?>

  <input type="hidden" name="id" value="<?= $user->id ?>">

  <div class="row mb-2">
    <!-- Password -->
    <div class="col">
      <div class="a-password-input mb-3">
        <label for="password"><?= lang('Auth.password') ?></label>
        <input
          type="password"
          name="password"
          id="password"
          autocomplete="password"
          placeholder="<?= lang('Auth.password') ?>"
          onkeyup="checkStrength()"
          required
        >
        <button type="button" class="a-password-input__icon-password">
          <i class="a-icon ui-ic-watch-on" title="LoremIpsum"></i>
        </button>
      </div>
      <div class="a-meter mb-5">
        <label for="pass-meter"><?= lang('Users.security.passwordStrength') ?></label>
        <meter
          id="pass-meter"
          min="0"
          max="100"
          low="50"
          high="75"
          optimum="100"
          value="0"
          aria-valuenow="0"
          aria-valuemin="0"
          aria-valuemax="100"
          aria-labelledby="Inner text"
        >
          Inner text
        </meter>
      </div>
      <!-- Password (Again) -->
      <div class="a-password-input mb-5">
        <label for="pass_confirm"><?= lang('Auth.passwordConfirm') ?></label>
        <input
          type="password"
          name="pass_confirm"
          id="pass_confirm"
          autocomplete="pass_confirm"
          placeholder="<?= lang('Auth.passwordConfirm') ?>"
          required
        >
        <button type="button" class="a-password-input__icon-password">
          <i class="a-icon ui-ic-watch-on" title="LoremIpsum"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="hstack justify-content-start py-3">
    <button type="submit" value="Update Password" class="a-button a-button--primary -without-icon">
      <span
        class="a-button__label"><?= lang('Users.security.updatePassword') ?></span>
    </button>
  </div>

</form>
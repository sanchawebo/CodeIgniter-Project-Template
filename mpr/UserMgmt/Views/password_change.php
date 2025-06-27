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
    method="post"
    class="needs-validation"
    novalidate>
    <?= csrf_field() ?>

    <input type="hidden" name="id" value="<?= $user->id ?>">

    <div class="mb-3">
        <!-- Password -->
        <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
        <div class="input-group mb-2">
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                autocomplete="new-password"
                placeholder="<?= lang('Auth.password') ?>"
                onkeyup="checkStrength()"
                required>
            <button type="button" class="btn btn-outline-secondary" tabindex="-1">
                <i class="fa fa-eye" title="Show/Hide Password"></i>
            </button>
        </div>
        <div class="mb-3">
            <label for="pass-meter" class="form-label"><?= lang('Users.security.passwordStrength') ?></label>
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
                class="form-range w-100">
                Inner text
            </meter>
        </div>
        <!-- Password (Again) -->
        <label for="pass_confirm" class="form-label"><?= lang('Auth.passwordConfirm') ?></label>
        <div class="input-group mb-3">
            <input
                type="password"
                name="pass_confirm"
                id="pass_confirm"
                class="form-control"
                autocomplete="new-password"
                placeholder="<?= lang('Auth.passwordConfirm') ?>"
                required>
            <button type="button" class="btn btn-outline-secondary" tabindex="-1">
                <i class="fa fa-eye" title="Show/Hide Password"></i>
            </button>
        </div>
    </div>

    <div class="d-flex justify-content-start py-3">
        <button type="submit" value="Update Password" class="btn btn-primary">
            <span><?= lang('Users.security.updatePassword') ?></span>
        </button>
    </div>
</form>
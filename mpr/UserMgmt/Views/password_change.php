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
                onkeyup="checkStrength(); debouncedCheckPasswordMatch()"
                required>
            <button type="button" class="btn btn-outline-secondary" tabindex="-1"
                _="on click
                    toggle between .fa-eye and .fa-eye-slash on <i.fa-solid/> in me
                    toggle [@type=password] on previous <input/>
                    end
                ">
                <i class="fa fa-eye" title="Show/Hide Password"></i>
            </button>
        </div>
        <div id="callout-meter" class="callout callout-secondary mb-3">
            <div class="form-label"><?= lang('Users.security.passwordStrength') ?></div>
            <!-- Password Meter -->
            <div id="pass-meter">
                <div class="segment segment-4"></div>
                <div class="segment segment-3"></div>
                <div class="segment segment-2"></div>
                <div class="segment segment-1"></div>
            </div>
            <div id="pass-suggestions" class="form-text"></div>
        </div>
        <!-- Password (Again) -->
        <label for="pass_confirm" class="form-label"><?= lang('Auth.passwordConfirm') ?></label>
        <div class="input-group mb-2">
            <input
                type="password"
                name="pass_confirm"
                id="pass_confirm"
                class="form-control"
                autocomplete="new-password"
                placeholder="<?= lang('Auth.passwordConfirm') ?>"
                onkeyup="debouncedCheckPasswordMatch()"
                required>
            <button type="button" class="btn btn-outline-secondary" tabindex="-1"
                _="on click
                    toggle between .fa-eye and .fa-eye-slash on <i.fa-solid/> in me
                    toggle [@type=password] on previous <input/>
                    end
                ">
                <i class="fa fa-eye" title="Show/Hide Password"></i>
            </button>
        </div>
        <div id="callout-matches" class="callout callout-secondary mb-3">
            <span><?= lang('Users.security.passwordMatch') ?></span>
            <div class="pass-match" id="pass-match" style="display:none">
                <i class="fa-solid fa-square-check"></i>
            </div>
            <div class="pass-not-match" id="pass-not-match" style="display:none">
                <i class="fa-solid fa-square-xmark"></i>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-start py-3">
        <button type="submit" value="Update Password" class="btn btn-primary">
            <span><?= lang('Users.security.updatePassword') ?></span>
        </button>
    </div>
</form>
<?php

use CodeIgniter\View\View;
use UserMgmt\Entities\User;

/**
 * @var View  $this
 * @var User  $user
 * @var array $permissions
 */
?>
<?php $this->section('title') ?>
<?= lang('Users.editUser') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>

<div class="mb-3">
    <a href="<?= url_to('user-list') ?>" class="btn btn-link p-0">
        <i class="fa fa-arrow-left"></i>
        <span><?= lang('Users.backList') ?></span>
    </a>
</div>

<?= view('Mpr\UserMgmt\Views\_tabs', ['tab' => 'permissions', 'user' => $user]) ?>

<form action="<?= current_url() ?>" method="post">
    <?= csrf_field() ?>

    <fieldset class="border-0 p-3 rounded mb-4 bg-light-subtle">
        <legend class="h5 mb-3">
            <?= lang('Users.permissions.head') ?>
        </legend>

        <div class="alert alert-info d-flex align-items-start" role="alert">
            <i class="fa fa-info-circle me-2 mt-1"></i>
            <div>
                <p class="mb-1"><?= lang('Users.permissions.info') ?></p>
                <div class="d-flex align-items-center">
                    <div class="form-check me-2">
                        <input
                            type="checkbox"
                            id="checkbox-example"
                            class="form-check-input in-group"
                            disabled>
                        <label class="form-check-label" for="checkbox-example">&nbsp;</label>
                    </div>
                    <?= lang('Users.permissions.infoCheck') ?>
                </div>
            </div>
        </div>

        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th style="width: 3rem"></th>
                    <th>
                        <?= lang('Users.permissions.permission') ?>
                    </th>
                    <th>
                        <?= lang('Users.permissions.description') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissions as $permission => $description) : ?>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input
                                    class="form-check-input <?= $user->can($permission) ? 'in-group' : '' ?>"
                                    type="checkbox" name="permissions[]"
                                    id="checkbox-<?= $permission ?>"
                                    value="<?= $permission ?>"
                                    <?php if ($user->hasPermission($permission)) : ?>
                                    checked
                                    <?php endif ?>>
                                <label class="form-check-label" for="checkbox-<?= $permission ?>">&nbsp;</label>
                            </div>
                        </td>
                        <td><?= $permission ?></td>
                        <td><?= $description ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </fieldset>

    <div class="py-3">
        <button type="submit" value="Save User" class="btn btn-primary">
            <span><?= lang('Users.saveUser') ?></span>
        </button>
    </div>

</form>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<script>
    let inputs = document.getElementsByClassName('in-group');
    Array.prototype.forEach.call(inputs, function(el, i) {
        el.indeterminate = true;
    });
</script>
<?php $this->endSection() ?>
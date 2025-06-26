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
<?= lang('Users.editUser') . ' | ' . lang('Users.siteTitle') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>

<div class="a-link a-link--integrated -icon ms-0">
  <a href="<?= url_to('user-list') ?>">
    <i class="a-icon boschicon-bosch-ic-arrow-left"></i>
    <span><?= lang('Users.backList') ?></span>
  </a>
</div>

<?= view('Mpr\UserMgmt\Views\_tabs', ['tab' => 'permissions', 'user' => $user]) ?>

<form action="<?= current_url() ?>" method="post">
  <?= csrf_field() ?>

  <fieldset class="border-0 mt-5">
    <legend class="a-legend">
      <?= lang('Users.permissions.head') ?>
    </legend>

    <div class="a-notification -neutral" role="alert">
      <i class="a-icon boschicon-bosch-ic-alert-info"></i>
      <div class="a-notification__content">
        <p class="mt-0"><?= lang('Users.permissions.info') ?></p>
        <div class="my-0 hstack align-items-start">
          <div class="a-checkbox a-checkbox--indeterminate d-inline-flex">
            <input
              type="checkbox"
              id="checkbox-example"
              disabled
            >
            <label for="checkbox-example">&nbsp;</label>
          </div>
          <?= lang('Users.permissions.infoCheck') ?>
        </div>
      </div>
    </div>

    <table class="m-table">
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
            <div class="a-checkbox d-table">
              <input
                class="<?= $user->can($permission) ? 'in-group' : '' ?>"
                type="checkbox" name="permissions[]"
                id="checkbox-<?= $permission ?>"
                value="<?= $permission ?>"
                <?php if ($user->hasPermission($permission)) : ?>
                  checked
                <?php endif ?>
              >
              <label for="checkbox-<?= $permission ?>">&nbsp;</label>
            </div>
          </td>
          <td><?= $permission ?></td>
          <td><?= $description ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </fieldset>

  <div class="hstack justify-content-start py-3">
    <button type="submit" value="Save User" class="a-button a-button--primary -without-icon">
      <span
        class="a-button__label"><?= lang('Users.saveUser') ?></span>
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
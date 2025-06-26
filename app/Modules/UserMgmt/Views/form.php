<?php

use CodeIgniter\View\View;
use UserMgmt\Entities\User;

require MODULEPATH . 'UserMgmt/functions.php';

/**
 * @var View       $this
 * @var array      $errors
 * @var array      $groups
 * @var array|null $countryList
 * @var User|null  $user
 */
helper('form');
?>
<?php $this->section('title') ?>
<?= (isset($user) ? lang('Users.editUser') : lang('Users.newUser')) . ' | ' . lang('Users.siteTitle') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>

<div class="hstack justify-content-between mb-3">
  <div class="a-link a-link--integrated -icon">
    <a href="<?= url_to('user-list') ?>">
      <i class="a-icon boschicon-bosch-ic-arrow-left"></i>
      <span><?= lang('Users.backList') ?></span>
    </a>
  </div>
  <?php if (isset($user) && $user !== null) : // @phpstan-ignore notIdentical.alwaysTrue?>
  <div class="a-link a-link--button-secondary -icon">
    <a href="<?= url_to('user-new') ?>">
      <i class="a-icon boschicon-bosch-ic-add"></i>
      <span><?= lang('Users.newUser') ?></span>
    </a>
  </div>
  <?php endif ?>
</div>

<?= view('Mpr\UserMgmt\Views\_tabs', ['tab' => 'details', 'user' => $user ?? null]) ?>

<?php if (isset($user) && $user !== null) : // @phpstan-ignore notIdentical.alwaysTrue?>
<form action="<?= $user->adminLink('/save') ?>"
  method="post" enctype="multipart/form-data">
  <?php else : ?>
  <form
    action="<?= (new User())->adminLink('/save') ?>"
    method="post" enctype="multipart/form-data">
    <?php endif ?>
    <?= csrf_field() ?>

    <?php if (isset($user) && $user !== null) : // @phpstan-ignore notIdentical.alwaysTrue?>
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <?php endif ?>

    <fieldset class="border-0">
      <legend class="a-legend">
        <?= lang('Users.info') ?>
      </legend>

      <div class="row">
        <div class="col">
          <div class="row">
            <!-- Email Address -->
            <div class="m-form-field col-12">
              <div class="a-text-field">
                <label
                  for="email"><?= lang('Users.email') ?></label>
                <input id="email" type="email" name="email"
                  value="<?= old('email', $user->email ?? '') ?>">
              </div>
              <?php // @phpstan-ignore-next-line?>
              <?php if (has_error('email')) : ?>
              <div class="a-notification a-notification--text -error" role="alert">
                <i class="a-icon ui-ic-alert-error"></i>
                <div class="a-notification__content">
                  <?php // @phpstan-ignore-next-line?>
                  <?= error('email') ?>
                </div>
              </div>
              <?php endif ?>
            </div>
            <!-- First Name -->
            <div class="m-form-field col-12 col-sm-6">
              <div class="a-text-field">
                <label
                  for="first-name"><?= lang('Users.firstName') ?></label>
                <input id="first-name" type="text" name="first_name"
                  value="<?= old('first_name', $user->first_name ?? '') ?>">
              </div>
              <?php // @phpstan-ignore-next-line?>
              <?php if (has_error('first_name')) : ?>
              <div class="a-notification a-notification--text -error" role="alert">
                <i class="a-icon ui-ic-alert-error"></i>
                <div class="a-notification__content">
                  <?php // @phpstan-ignore-next-line?>
                  <?= error('first_name') ?>
                </div>
              </div>
              <?php endif ?>
            </div>
            <!-- Last Name -->
            <div class="m-form-field col-12 col-sm-6">
              <div class="a-text-field">
                <label
                  for="last-name"><?= lang('Users.lastName') ?></label>
                <input id="last-name" type="text" name="last_name"
                  value="<?= old('last_name', $user->last_name ?? '') ?>">
              </div>
              <?php // @phpstan-ignore-next-line?>
              <?php if (has_error('last_name')) : ?>
              <div class="a-notification a-notification--text -error" role="alert">
                <i class="a-icon ui-ic-alert-error"></i>
                <div class="a-notification__content">
                  <?php // @phpstan-ignore-next-line?>
                  <?= error('last_name') ?>
                </div>
              </div>
              <?php endif ?>
            </div>
            <!-- Country -->
            <div class="m-form-field m-form-field--dropdown mt-3">
              <div class="a-dropdown">
                <label
                  for="country"><?= lang('Users.country') ?></label>
                <?= form_dropdown([
                    'id'           => 'country',
                    'name'         => 'country_code',
                    'aria-label'   => lang('Users.country'),
                    'options'      => $countryList ?? [],
                    'autocomplete' => 'off',
                    'selected'     => old('country_code', $user->country_code ?? ''),
                ]) ?>
              </div>
              <?= validation_show_error('country') ?>
            </div>
          </div>
        </div>
      </div>
    </fieldset>

    <fieldset class="border-0">
      <legend class="a-legend">
        <?= lang('Users.groups') ?>
      </legend>

      <?php if (auth()->user()->can('users.edit')) : ?>
      <p class="mt-0">
        <?= lang('Users.groupsInfo') ?>
      </p>
      <?php else : ?>
      <p class="mt-0">
        <?= lang('Users.groupsNoPermission') ?>
      </p>
      <?php endif; ?>

      <div class="row">
        <div class="col-12">
          <?php foreach ($groups as $group => $info) : ?>
          <div class="m-form-field m-form-field--radio">
            <div class="a-radio-button">
              <input type="radio"
                id="group-<?= $group ?>"
                name="group"
                value="<?= $group ?>"
                <?= (isset($user) && $user->inGroup($group)) ? 'checked' : '' ?>
                <?= ((! auth()->user()->can('users.edit')) || ($info['disabled'] ?? false)) ? 'disabled' : '' ?>
              >
              <label for="group-<?= $group ?>">
                <?= $info['title'] ?? $group ?>&nbsp;&mdash;&nbsp;<?= $info['description'] ?? '' ?>
              </label>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </fieldset>

    <div class="hstack justify-content-start py-3">
      <button type="submit" value="Save User" class="a-button a-button--primary -without-icon">
        <span
          class="a-button__label"><?= lang('Users.saveUser') ?></span>
      </button>
    </div>

  </form>

  <?php $this->endSection() ?>
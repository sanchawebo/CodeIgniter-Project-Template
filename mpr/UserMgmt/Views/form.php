<?php

use CodeIgniter\View\View;
use Mpr\UserMgmt\Entities\User;

require ROOTPATH . 'Mpr/UserMgmt/functions.php';

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
<?= (isset($user) ? lang('Users.editUser') : lang('Users.newUser')) ?>
<?php $this->endSection() ?>

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>

<div class="d-flex justify-content-between mb-3">
    <div>
        <a href="<?= url_to('user-list') ?>" class="btn btn-link">
            <i class="fas fa-arrow-left"></i>
            <span><?= lang('Users.backList') ?></span>
        </a>
    </div>
    <?php if (isset($user) && $user !== null) : ?>
        <div>
            <a href="<?= url_to('user-new') ?>" class="btn btn-secondary">
                <i class="fas fa-plus"></i>
                <span><?= lang('Users.newUser') ?></span>
            </a>
        </div>
    <?php endif ?>
</div>

<?= view('Mpr\UserMgmt\Views\_tabs', ['tab' => 'details', 'user' => $user ?? null]) ?>

<?php if (isset($user) && $user !== null) : ?>
    <form action="<?= $user->adminLink('/save') ?>" method="post" enctype="multipart/form-data">
    <?php else : ?>
        <form action="<?= (new User())->adminLink('/save') ?>" method="post" enctype="multipart/form-data">
        <?php endif ?>
        <?= csrf_field() ?>

        <?php if (isset($user) && $user !== null) : ?>
            <input type="hidden" name="id" value="<?= $user->id ?>">
        <?php endif ?>

        <fieldset class="border-0 mb-4">
            <legend class="h5 mb-3"><?= lang('Users.info') ?></legend>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <!-- Email Address -->
                        <div class="form-group col-12 mb-3">
                            <label for="email"><?= lang('Users.email') ?></label>
                            <input id="email" type="email" name="email" class="form-control"
                                value="<?= old('email', $user->email ?? '') ?>">
                            <?php if (has_error('email')) : ?>
                                <div class="alert alert-danger mt-2 p-2" role="alert">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <?= error('email') ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- First Name -->
                        <div class="form-group col-12 col-sm-6 mb-3">
                            <label for="first-name"><?= lang('Users.firstName') ?></label>
                            <input id="first-name" type="text" name="first_name" class="form-control"
                                value="<?= old('first_name', $user->first_name ?? '') ?>">
                            <?php if (has_error('first_name')) : ?>
                                <div class="alert alert-danger mt-2 p-2" role="alert">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <?= error('first_name') ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- Last Name -->
                        <div class="form-group col-12 col-sm-6 mb-3">
                            <label for="last-name"><?= lang('Users.lastName') ?></label>
                            <input id="last-name" type="text" name="last_name" class="form-control"
                                value="<?= old('last_name', $user->last_name ?? '') ?>">
                            <?php if (has_error('last_name')) : ?>
                                <div class="alert alert-danger mt-2 p-2" role="alert">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <?= error('last_name') ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- Country -->
                        <div class="form-group col-12 mt-3">
                            <label for="country"><?= lang('Users.country') ?></label>
                            <?= form_dropdown([
                                'id'           => 'country',
                                'name'         => 'country_code',
                                'aria-label'   => lang('Users.country'),
                                'options'      => $countryList ?? [],
                                'autocomplete' => 'off',
                                'selected'     => old('country_code', $user->country_code ?? ''),
                                'class'        => 'form-select',
                            ]) ?>
                            <?= validation_show_error('country') ?>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="border-0 mb-4">
            <legend class="h5 mb-3"><?= lang('Users.groups') ?></legend>
            <?php if (auth()->user()->can('users.edit')) : ?>
                <p class="mt-0"><?= lang('Users.groupsInfo') ?></p>
            <?php else : ?>
                <p class="mt-0"><?= lang('Users.groupsNoPermission') ?></p>
            <?php endif; ?>

            <div class="row">
                <div class="col-12">
                    <?php foreach ($groups as $group => $info) : ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio"
                                id="group-<?= $group ?>"
                                name="group"
                                value="<?= $group ?>"
                                <?= (isset($user) && $user->inGroup($group)) ? 'checked' : '' ?>
                                <?= ((! auth()->user()->can('users.edit')) || ($info['disabled'] ?? false)) ? 'disabled' : '' ?>>
                            <label class="form-check-label" for="group-<?= $group ?>">
                                <?= $info['title'] ?? $group ?>&nbsp;&mdash;&nbsp;<?= $info['description'] ?? '' ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </fieldset>

        <div class="d-flex justify-content-start py-3">
            <button type="submit" value="Save User" class="btn btn-primary">
                <i class="fas fa-save"></i>
                <span><?= lang('Users.saveUser') ?></span>
            </button>
        </div>
        </form>

        <?php $this->endSection() ?>
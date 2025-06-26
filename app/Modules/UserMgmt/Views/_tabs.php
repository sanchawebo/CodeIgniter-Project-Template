<?php

use UserMgmt\Entities\User;

/**
 * @var string    $tab
 * @var User|null $user
 */
?>
<div class="a-tab-navigation__wrapper">
  <div class="a-tab-navigation__gradients"></div>
  <ol class="a-tab-navigation" role="tablist">
    <li class="a-tab-navigation__item" role="none">
      <a class="a-tab-navigation__tab <?= ($tab === 'details') ? '-selected' : '' ?>"
        href="<?= isset($user) ? $user->adminLink() : '#' ?>"
        tabindex="0" role="tab">
        <span class="a-tab-navigation__tab-content">
          <span
            class="a-tab-navigation__label"><?= lang('Users.details') ?></span>
        </span>
      </a>
    </li>
    <?php if (isset($user) && $user !== null) : // @phpstan-ignore notIdentical.alwaysTrue?>
    <?php if (auth()->user()->can('users.edit')) : ?>
    <li class="a-tab-navigation__item" role="none">
      <a class="a-tab-navigation__tab <?= ($tab === 'permissions') ? '-selected' : '' ?>"
        href="<?= $user->adminLink('permissions') ?>"
        tabindex="0" role="tab">
        <span class="a-tab-navigation__tab-content">
          <span
            class="a-tab-navigation__label"><?= lang('Users.permissions.permissions') ?></span>
        </span>
      </a>
    </li>
    <?php endif ?>
    <li class="a-tab-navigation__item" role="none">
      <a class="a-tab-navigation__tab <?= ($tab === 'security') ? '-selected' : '' ?>"
        href="<?= $user->adminLink('security') ?>"
        tabindex="0" role="tab">
        <span class="a-tab-navigation__tab-content">
          <span
            class="a-tab-navigation__label"><?= lang('Users.security.head') ?></span>
        </span>
      </a>
    </li>
    <?php endif ?>
    <?php // @phpstan-ignore-next-line?>
    <?= service('resourceTabs')->renderTabsFor('user') ?>
  </ol>
</div>
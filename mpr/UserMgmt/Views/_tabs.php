<?php

use UserMgmt\Entities\User;

/**
 * @var string    $tab
 * @var User|null $user
 */
?>
<div class="container mt-3">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link <?= ($tab === 'details') ? 'active' : '' ?>"
                href="<?= isset($user) ? $user->adminLink() : '#' ?>"
                role="tab">
                <i class="fa fa-user"></i>
                <?= lang('Users.details') ?>
            </a>
        </li>
        <?php if (isset($user) && $user !== null) : ?>
            <?php if (auth()->user()->can('users.edit')) : ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?= ($tab === 'permissions') ? 'active' : '' ?>"
                        href="<?= $user->adminLink('permissions') ?>"
                        role="tab">
                        <i class="fa fa-key"></i>
                        <?= lang('Users.permissions.permissions') ?>
                    </a>
                </li>
            <?php endif ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= ($tab === 'security') ? 'active' : '' ?>"
                    href="<?= $user->adminLink('security') ?>"
                    role="tab">
                    <i class="fa fa-shield-alt"></i>
                    <?= lang('Users.security.head') ?>
                </a>
            </li>
        <?php endif ?>
        <?= service('resourceTabs')->renderTabsFor('user') ?>
    </ul>
</div>
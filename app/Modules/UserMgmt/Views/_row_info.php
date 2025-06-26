<?php

use CodeIgniter\View\View;
use UserMgmt\Entities\User;

/**
 * @var View $this
 * @var User $user
 */
?>
<td>
    <?php if ($user->email): ?>
        <?php if (auth()->user()->can('users.edit') || auth()->user()->can('users.delete')) : ?>
            <a href="<?= $user->adminLink() ?>"><?= esc($user->getEmail()) ?></a>
        <?php else: ?>
            <?= esc($user->getEmail()) ?>
        <?php endif; ?>
    <?php else: ?>
        -
    <?php endif; ?>
</td>
<td>
    <?php if ($user->username): ?>
        <?php if (auth()->user()->can('users.edit') || auth()->user()->can('users.delete')) : ?>
            <a href="<?= $user->adminLink() ?>"><?= esc($user->username) ?></a>
        <?php else: ?>
            <?= esc($user->username) ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if (auth()->user()->can('users.edit') || auth()->user()->can('users.delete')) : ?>
            <a href="<?= $user->adminLink() ?>">
                <?= esc($user->first_name) . ' ' . esc($user->last_name) ?>
            </a>
        <?php else: ?>
            <?= esc($user->first_name) . ' ' . esc($user->last_name) ?>
        <?php endif; ?>
    <?php endif; ?>
</td>
<td>
    <?= $user->groupsList() ?></td>
<td>
    <?= $user->last_active !== null ? $user->last_active->humanize() : lang('Users.never') ?>
</td>
<td class="-with-icon d-flex justify-content-end">
    <?php if (auth()->user()->can('users.edit') || auth()->user()->can('users.delete')) : ?>
        <!-- Action Menu -->
        <nav class="o-context-menu" aria-label="Context Menu Navigation Default" aria-hidden="false">
            <button type="button" class="a-button a-button--integrated -without-label o-context-menu__trigger" data-frok-action="open" aria-haspopup="true" aria-label="Open Context Menu">
                <i class="a-icon a-button__icon boschicon-bosch-ic-options py-0" title="options"></i>
            </button>
            <button type="button" class="a-button a-button--integrated -without-label o-context-menu__trigger" data-frok-action="close" aria-haspopup="false" aria-label="Close Context Menu">
                <i class="a-icon a-button__icon boschicon-bosch-ic-close py-0" title="close"></i>
            </button>
            <div class="m-popover">
                <div class="a-box -floating">
                    <div class="m-popover__content">
                        <ul class="o-context-menu__menuItems" role="menubar">
                            <?php if (auth()->user()->can('users.edit')) : ?>
                                <li class="a-menu-item" role="none">
                                    <a href="<?= $user->adminLink() ?>" role="menuitem" class="a-menu-item__link" aria-disabled="false">
                                        <i class="a-icon boschicon-bosch-ic-edit"></i>
                                        <span class="a-menu-item__label"><?= lang('Users.edit') ?></span>
                                    </a>
                                </li>
                            <?php endif ?>
                            <?php if (auth()->user()->can('users.delete')) : ?>
                                <hr class="a-divider">
                                <li class="a-menu-item" role="none">
                                    <a href="<?= $user->adminLink('delete') ?>"
                                        role="menuitem"
                                        class="a-menu-item__link"
                                        aria-disabled="false"
                                        onclick="return confirm(<?= lang('Users.deleteConfirm') ?>)">
                                        <i class="a-icon boschicon-bosch-ic-delete"></i>
                                        <span class="a-menu-item__label"><?= lang('Users.delete') ?></span>
                                    </a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif ?>
</td>
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
    <?= $user->groupsList() ?>
</td>
<td>
    <?= $user->last_active !== null ? $user->last_active->humanize() : lang('Users.never') ?>
</td>
<td class="d-flex justify-content-end">
    <?php if (auth()->user()->can('users.edit') || auth()->user()->can('users.delete')) : ?>
        <div class="dropdown">
            <button class="btn btn-default btn-sm dropdown-toggle"
                type="button"
                id="dropdownMenuButton<?= $user->id ?>"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                title="<?= lang('Users.actions') ?>"
                aria-label="<?= lang('Users.actions') ?>"
            >
                <i class="fa-solid fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton<?= $user->id ?>">
                <?php if (auth()->user()->can('users.edit')) : ?>
                    <li>
                        <a class="dropdown-item" href="<?= $user->adminLink() ?>">
                            <i class="bi bi-pencil me-2"></i><?= lang('Users.edit') ?>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (auth()->user()->can('users.delete')) : ?>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="<?= $user->adminLink('delete') ?>"
                           onclick="return confirm('<?= lang('Users.deleteConfirm') ?>')">
                            <i class="bi bi-trash me-2"></i><?= lang('Users.delete') ?>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    <?php endif ?>
</td>

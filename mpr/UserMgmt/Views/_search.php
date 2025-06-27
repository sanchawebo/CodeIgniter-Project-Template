<?php

use CodeIgniter\View\View;

/**
 * @var View        $this
 * @var bool|null   $oob
 * @var string|null $searchTerm
 */
?>

<form id="user-search-form"
    <?= (isset($oob)) ? ($oob ? 'hx-swap-oob="true"' : '') : '' ?>
    action="<?= route_to('user-search') ?>" method="POST"
    hx-post="<?= route_to('user-search') ?>"
    hx-target="#users-table"
    hx-trigger="submit, from:#user-search">
    <?= csrf_field() ?>
    <label for="user-search" class="visually-hidden"><?= lang('Users.search') ?></label>
    <div class="input-group">
        <input type="search"
            class="form-control"
            id="user-search"
            name="search"
            placeholder="<?= lang('Users.searchPlaceholder') ?>"
            hx-post="<?= route_to('user-search') ?>"
            hx-trigger="input changed delay:500ms, search"
            value="<?= $searchTerm ?? '' ?>">
        <button type="button" class="btn btn-outline-secondary" id="clear-search" title="<?= lang('Users.clearSearch') ?>">
            <i class="fa fa-times"></i>
        </button>
        <button type="submit" class="btn btn-primary" title="<?= lang('Users.search') ?>">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>
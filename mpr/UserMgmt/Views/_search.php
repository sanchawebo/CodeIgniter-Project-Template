<?php
/**
 * @var CodeIgniter\View\View $this
 * @var bool|null             $oob
 * @var string|null           $searchTerm
 */
?>

<form id="user-search-form"
    <?= (isset($oob)) ? ($oob ? 'hx-swap-oob="true"' : '') : '' ?>
    action="<?= route_to('user-search') ?>" method="POST"
    hx-post="<?= route_to('user-search') ?>"
    hx-target="#users-table"
    hx-trigger="submit, from:#user-search"
>
    <?= csrf_field() ?>
    <div class="a-search-input">
      <label for="user-search"><?= lang('Users.search') ?></label>
      <input class="form-control" type="search"
        id="user-search" name="search"
        placeholder="<?= lang('Users.searchPlaceholder') ?>"
        hx-post="<?= route_to('user-search') ?>"
        hx-trigger="input changed delay:500ms, search"
        value="<?= $searchTerm ?? '' ?>"
      >
      <button type="button" class="a-search-input__icon-close">
        <i class="a-icon ui-ic-close-small" title="close-small"></i>
      </button>
      <button type="submit" class="a-search-input__icon-search">
        <i class="a-icon ui-ic-search" title="LoremIpsum"></i>
      </button>
    </div>
</form>
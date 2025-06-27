<?php

use CodeIgniter\Pager\Pager;
use CodeIgniter\View\View;

/**
 * @var View  $this
 * @var Pager $pager
 */
?>
<div class="col" id="user-list">
    <form
        action="<?= site_url('/admin/users/delete-batch') ?>"
        method="post">
        <?= csrf_field() ?>
        <table class="table table-striped mt-5">
            <?= $this->include('Mpr\UserMgmt\Views\_table_head') ?>
            <tbody>
                <?php if (isset($users) && count($users)) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <?php if (auth()->user()->can('users.delete')): ?>
                                <td>
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="selects[<?= $user->id ?>]"
                                            id="checkbox-<?= $user->id ?>"
                                            class="form-check-input">
                                        <label class="form-check-label" for="checkbox-<?= $user->id ?>">&nbsp;</label>
                                    </div>
                                </td>
                            <?php endif ?>
                            <?= view('Mpr\UserMgmt\Views\_row_info', ['user' => $user], ['saveData' => false]) ?>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>

        <?php if (auth()->user()->can('users.delete')) : ?>
            <button type="submit" value="Delete Selected" class="btn btn-secondary mt-2">
                <i class="fas fa-trash-alt"></i>
                <span><?= lang('Users.deleteSelected') ?></span>
            </button>
        <?php endif ?>

        <div class="mt-5 d-flex justify-content-center">
            <?= $pager->links('default', 'custom_full') ?>
        </div>
    </form>
</div>
<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 * @var array $pendingUsers
 */
?>

<?php $this->section('pageTitle') ?>
<?= lang('Admin.usersActivate.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('Admin.usersActivate.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper(['form']); ?>

<h1 class="mb-3 -size-xl"><?= lang('Admin.usersActivate.heading') ?></h1>

<?= validation_show_error('id', 'single_full') ?>
<?= validation_show_error('email', 'single_full') ?>
<?php if (session('actionActivateSuccess') !== null) : ?>
    <?= frok_notification('success', session('actionActivateSuccess')) ?>
<?php endif; ?>
<?php if (session('actionDeleteSuccess') !== null) : ?>
    <?= frok_notification('success', session('actionDeleteSuccess')) ?>
<?php endif; ?>
<?php if (session('error') !== null) : ?>
    <?= frok_notification('error', session('error')) ?>
<?php endif; ?>

<table class="m-table" aria-label="Highlights">
    <thead>
        <tr>
            <th><?= lang('Admin.usersActivate.tableHead1') ?></th>
            <th style="width: 30%; padding-left: 30px;"><?= lang('Admin.usersActivate.tableHead2') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if (! empty($pendingUsers)): ?>
            
        <?php foreach ($pendingUsers as $user): ?>
            <tr>
                <td>
                    <?= $user['secret'] ?>
                </td>
                <td>
                    <div class="d-flex gap-3">
                        <form action="<?= route_to('UserController::activateHandle') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <input type="hidden" name="email" value="<?= $user['secret'] ?>">
                            <button type="submit" class="a-button a-button--primary">
                                <i class="a-icon a-button__icon boschicon-bosch-ic-alert-success" title="alert-success"></i>
                                <span class="a-button__label"><?= lang('Admin.usersActivate.actionActivate') ?></span>
                            </button>
                        </form>
                        <form action="<?= route_to('UserController::deleteHandle') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" class="a-button a-button--secondary">
                                <i class="a-icon a-button__icon boschicon-bosch-ic-alert-error" title="alert-error"></i>
                                <span class="a-button__label"><?= lang('Admin.usersActivate.actionDelete') ?></span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
        
        <?php else: ?>
    
            <tr>
                <td class="fst-italic"><?= lang('Admin.usersActivate.noUsers') ?></td>
                <td>
                    <div class="d-flex gap-3">
                        <button type="button" class="a-button a-button--primary" disabled>
                            <i class="a-icon a-button__icon boschicon-bosch-ic-alert-success" title="alert-success"></i>
                            <span class="a-button__label"><?= lang('Admin.usersActivate.actionActivate') ?></span>
                        </button>
                        <button type="button" class="a-button a-button--secondary" disabled>
                            <i class="a-icon a-button__icon boschicon-bosch-ic-alert-error" title="alert-error"></i>
                            <span class="a-button__label"><?= lang('Admin.usersActivate.actionDelete') ?></span>
                        </button>
                    </div>
                </td>
            </tr>

        <?php endif; ?>

    </tbody>
</table>

<?php $this->endSection() ?>
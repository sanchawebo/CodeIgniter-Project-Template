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

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>
<?php helper(['form']); ?>

<h1 class="mb-3 -size-xl"><?= lang('Admin.usersActivate.heading') ?></h1>

<?= validation_show_error('id', 'single_full') ?>
<?= validation_show_error('email', 'single_full') ?>
<?php if (session('actionActivateSuccess') !== null) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= esc(session('actionActivateSuccess')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session('actionDeleteSuccess') !== null) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= esc(session('actionDeleteSuccess')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session('error') !== null) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= esc(session('error')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<table class="table table-striped" aria-label="Highlights">
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
                        <form action="<?= route_to('UserController::activateHandle') ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <input type="hidden" name="email" value="<?= $user['secret'] ?>">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-check-circle me-1" title="Activate"></i>
                                <span><?= lang('Admin.usersActivate.actionActivate') ?></span>
                            </button>
                        </form>
                        <form action="<?= route_to('UserController::deleteHandle') ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa-solid fa-times-circle me-1" title="Delete"></i>
                                <span><?= lang('Admin.usersActivate.actionDelete') ?></span>
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
                        <button type="button" class="btn btn-primary" disabled>
                            <i class="fa-solid fa-check-circle me-1" title="Activate"></i>
                            <span><?= lang('Admin.usersActivate.actionActivate') ?></span>
                        </button>
                        <button type="button" class="btn btn-secondary" disabled>
                            <i class="fa-solid fa-times-circle me-1" title="Delete"></i>
                            <span><?= lang('Admin.usersActivate.actionDelete') ?></span>
                        </button>
                    </div>
                </td>
            </tr>

        <?php endif; ?>

    </tbody>
</table>

<?php $this->endSection() ?>
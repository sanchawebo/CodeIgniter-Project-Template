<?php

use CodeIgniter\View\View;
use UserMgmt\Entities\User;

require ROOTPATH . 'Mpr/UserMgmt/functions.php';

/**
 * @var View  $this
 * @var User  $user
 * @var array $logins
 */
?>
<?php $this->section('title') ?>
<?= lang('Users.editUser') ?>
<?php $this->endSection() ?>

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div class="mb-3">
    <a href="<?= url_to('user-list') ?>" class="btn btn-link p-0">
        <i class="fa fa-arrow-left"></i>
        <span><?= lang('Users.backList') ?></span>
    </a>
</div>

<?= view('Mpr\UserMgmt\Views\_tabs', ['tab' => 'security', 'user' => $user]) ?>

<fieldset class="border-0 mt-5">
    <legend class="h5">
        <?= lang('Users.security.changePassword') ?>
    </legend>
    <?= view('Mpr\UserMgmt\Views\password_change', ['user' => $user]) ?>
</fieldset>

<fieldset class="border-0 mt-5">
    <legend class="h5">
        <?= lang('Users.security.recentLogins') ?>
    </legend>

    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= lang('Users.security.date') ?></th>
                <th><?= lang('Users.security.ipAddress') ?></th>
                <th><?= lang('Users.security.userAgent') ?></th>
                <th><?= lang('Users.security.success') ?></th>
            </tr>
        </thead>
        <?php if (count($logins)) : ?>
            <tbody>
                <?php foreach ($logins as $login) : ?>
                    <tr>
                        <td><?= app_date($login->date, true, true) ?></td>
                        <td><?= $login->ip_address ?? '' ?></td>
                        <td><?= $login->user_agent ?? '' ?></td>
                        <td>
                            <?php if ($login->success) : ?>
                                <span class="badge bg-success">
                                    <i class="fa fa-check-circle"></i> <?= lang('Users.security.succeeded') ?>
                                </span>
                            <?php else : ?>
                                <span class="badge bg-secondary">
                                    <i class="fa fa-times-circle"></i> <?= lang('Users.security.failed') ?>
                                </span>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        <?php else : ?>
            <tbody>
                <tr>
                    <td colspan="4">
                        <div class="alert alert-info d-flex align-items-center mb-0" role="alert">
                            <i class="fa fa-info-circle me-2"></i>
                            <div>
                                <?= lang('Users.security.noRecentLogins') ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php endif ?>
    </table>
</fieldset>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script defer>
    function checkStrength() {
        let input = document.getElementById('password');
        let meter = document.getElementById('pass-meter');
        let info = zxcvbn(input.value);
        let score;

        switch (info.score) {
            case 1:
                score = 25;
                break;
            case 2:
                score = 50;
                break;
            case 3:
                score = 75;
                break;
            case 4:
                score = 100;
                break;
            default:
                score = 0;
                break;
        }
        meter.value = score;
        meter.ariaValueNow = score;
    }
</script>
<?php $this->endSection() ?>
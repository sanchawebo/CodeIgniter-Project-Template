<?php

use CodeIgniter\View\View;
use UserMgmt\Entities\User;

require MODULEPATH . 'UserMgmt/functions.php';

/**
 * @var View  $this
 * @var User  $user
 * @var array $logins
 */
?>
<?php $this->section('title') ?>
<?= lang('Users.editUser') . ' | ' . lang('Users.siteTitle') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div class="a-link a-link--integrated -icon ms-0">
  <a href="<?= url_to('user-list') ?>">
    <i class="a-icon boschicon-bosch-ic-arrow-left"></i>
    <span><?= lang('Users.backList') ?></span>
  </a>
</div>

<?= view('Mpr\UserMgmt\Views\_tabs', ['tab' => 'security', 'user' => $user]) ?>

<fieldset class="border-0 mt-5">
  <legend class="a-legend">
    <?= lang('Users.security.changePassword') ?>
  </legend>
  <?= view('Mpr\UserMgmt\Views\password_change', ['user' => $user]) ?>
</fieldset>

<fieldset class="border-0 mt-5">
  <legend class="a-legend">
    <?= lang('Users.security.recentLogins') ?>
  </legend>

  <table class="m-table">
    <thead>
      <tr>
        <th><?= lang('Users.security.date') ?>
        </th>
        <th>
          <?= lang('Users.security.ipAddress') ?>
        </th>
        <th>
          <?= lang('Users.security.userAgent') ?>
        </th>
        <th><?= lang('Users.security.success') ?>
        </th>
      </tr>
    </thead>
    <?php if (count($logins)) : ?>
    <tbody>
      <?php foreach ($logins as $login) : ?>
      <tr>
        <?php // @phpstan-ignore-next-line?>
        <td><?= app_date($login->date, true, true) ?></td>
        <td><?= $login->ip_address ?? '' ?></td>
        <td><?= $login->user_agent ?? '' ?></td>
        <td>
          <?php if ($login->success) : ?>
          <span
            class="a-badge -success"><?= lang('Users.security.succeeded') ?></span>
          <?php else : ?>
          <span
            class="a-badge -gray"><?= lang('Users.security.failed') ?></span>
          <?php endif ?>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
    <?php else : ?>
      <tbody>
        <tr>
          <td colspan="4">
            <div class="a-notification -neutral" role="alert">
              <i class="a-icon boschicon-bosch-ic-alert-info"></i>
              <div class="a-notification__content">
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
    // let suggestBox = document.getElementById('pass-suggestions');
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
    console.log({score});
    meter.value = score;
    meter.ariaValueNow = score;
    // suggestBox.innerText = info.feedback.suggestions.join(' ');
  }
</script>
<?php $this->endSection() ?>
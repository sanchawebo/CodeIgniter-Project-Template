<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('title') ?>
<?= lang('Users.list') . ' | ' . lang('Users.siteTitle') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\UserMgmt\Views\layout'); ?>
<?php $this->section('main'); ?>

<div class="row align-items-center">
  <div class="col">
    <?= $this->include('Mpr\UserMgmt\Views\_search') ?>
  </div>
  <?php if (auth()->user()->can('users.create')): ?>
  <div class="col-auto">
    <div class="a-link a-link--button-secondary -icon">
      <a href="<?= url_to('user-new') ?>">
        <i class="a-icon boschicon-bosch-ic-add"></i>
        <span><?= lang('Users.newUser') ?></span>
      </a>
    </div>
  </div>
  <?php endif ?>
</div>
<div class="row">
  <div id="users-table"><?= $this->include('Mpr\UserMgmt\Views\_table') ?></div>
</div>
<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>

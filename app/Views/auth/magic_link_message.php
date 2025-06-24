<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('Auth.useMagicLink') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-540 mx-auto max-vh-100 p-5 overflow-y-auto -primary text-center">
    <h1 class="-size-2xl"><?= lang('Auth.checkYourEmail') ?></h1>
    <p><?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
</div>

<?php $this->endSection() ?>

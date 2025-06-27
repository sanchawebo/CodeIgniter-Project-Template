<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('Auth.useMagicLink') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-sm mx-auto max-vh-100 p-5 overflow-y-auto text-center border border-secondary bg-light-subtle rounded">
    <h1 class=""><?= lang('Auth.checkYourEmail') ?></h1>
    <p><?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
</div>

<?php $this->endSection() ?>

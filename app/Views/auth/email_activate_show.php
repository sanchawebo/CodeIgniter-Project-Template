<?php
/**
 * @var CodeIgniter\View\View $this
 * @var CodeIgniter\Shield\Entities\User $user
 */
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('ScpAuth.emailActivate.pageTitle') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-540 mx-auto max-vh-100 p-5 overflow-y-auto -primary">
    <h1 class="text-center -size-2xl mb-3"><?= lang('ScpAuth.emailActivate.title') ?></h1>

    <p class="text-center">
        <?= lang('ScpAuth.emailActivate.body') ?><br>
    </p>
    <p class="fw-bold text-center"><?= $user->email ?></p>
</div>

<?php $this->endSection() ?>
<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('Auth.magicLink.title') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-sm mx-auto max-vh-100 p-5 overflow-y-auto border border-secondary bg-light-subtle rounded">
    <a href="<?= route_to('login') ?>" class="btn btn-link mb-3">
        <i class="fas fa-arrow-left-long me-2"></i><?= lang('Auth.magicLink.back') ?>
    </a>
    <h1 class="text-center"><?= lang('Auth.magicLink.title') ?></h1>
    <?= session_alert('error') ?>
    <form action="<?= url_to('magic-link') ?>" method="post">
        <?= csrf_field() ?>

        <p class="text-center"><?= lang('Auth.magicLink.text') ?></p>
        <!-- Email -->
        <div class="mb-3">
            <label class="form-label" for="email"><?= lang('Auth.magicLink.email') ?> *</label>
            <input class="form-control" type="email" name="email" id="email" autocomplete="email" value="<?= old('email', auth()->user()->email ?? null) ?>" required />
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-5">
            <?= lang('Auth.magicLink.sendBtn') ?>
        </button>

    </form>
</div>
<?php $this->endSection() ?>
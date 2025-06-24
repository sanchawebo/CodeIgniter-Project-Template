<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('ScpAuth.magicLink.pageTitle') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-600 mx-auto max-vh-100 p-5 overflow-y-auto -primary">
    <?= frok_link(route_to('login'), lang('ScpAuth.requestAccess.back'), 'boschicon-bosch-ic-arrow-left', true, true) ?>
    <h1 class="text-center -size-2xl"><?= lang('ScpAuth.magicLink.title') ?></h1>
    <div class="o-form m-0">
        <?php if (session('error') !== null) : ?>
            <?= frok_notification('error', session('error')) ?>
        <?php elseif (session('errors') !== null) : ?>
            <?= frok_notification('error', session('errors')) ?>
        <?php endif; ?>
        <form action="<?= url_to('magic-link') ?>" method="post">
            <?= csrf_field() ?>

            <p class="text-center"><?= lang('ScpAuth.magicLink.text') ?></p>
            <!-- Email -->
            <div class="m-form-field">
                <div class="a-text-field">
                    <label for="email"><?= lang('ScpAuth.magicLink.email') ?> *</label>
                    <input type="email" name="email" id="email" autocomplete="email" value="<?= old('email', auth()->user()->email ?? null) ?>" required />
                </div>
            </div>

            <button type="submit" class="a-button a-button--primary -without-icon w-100 mb-0">
                <span class="a-button__label"><?= lang('ScpAuth.magicLink.sendBtn') ?></span>
            </button>

        </form>
    </div>
</div>
<?php $this->endSection() ?>
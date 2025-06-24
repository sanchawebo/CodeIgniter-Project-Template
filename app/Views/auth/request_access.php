<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->extend(config('Auth')->views['layout']) ?>

<?php $this->section('title') ?><?= lang('ScpAuth.requestAccess.pageTitle') ?> <?php $this->endSection() ?>

<?php $this->section('main') ?>

<div class="box-w-600 mx-auto max-vh-100 p-5 overflow-y-auto -primary">
    <?= frok_link(route_to('login'), lang('ScpAuth.requestAccess.back'), 'boschicon-bosch-ic-arrow-left', true, true) ?>
    <h1 class="text-center -size-2xl"><?= lang('ScpAuth.requestAccess.title') ?></h1>
    <div class="o-form m-0">
        <?php if (session('error') !== null) : ?>
            <?= frok_notification('error', session('error')) ?>
        <?php elseif (session('errors') !== null) : ?>
            <?= frok_notification('error', session('errors')) ?>
        <?php endif; ?>
        <form action="<?= url_to('request-access') ?>" method="post">
            <?= csrf_field() ?>

            <p class="text-center"><?= lang('ScpAuth.requestAccess.text') ?></p>
            <!-- Email -->
            <div class="m-form-field">
                <div class="a-text-field">
                    <label for="email"><?= lang('ScpAuth.requestAccess.email') ?> *</label>
                    <input type="email" name="email" id="email" autocomplete="email" value="<?= old('email') ?>" required />
                </div>
            </div>

            <!-- Bosch Email -->
            <div class="m-form-field">
                <div class="a-text-field">
                    <label for="bosch-email"><?= lang('ScpAuth.requestAccess.boschEmail') ?> *</label>
                    <input type="email" name="bosch_contact_email" id="bosch-email" autocomplete="email" value="<?= old('bosch_contact_email') ?>" required />
                </div>
            </div>

            <button type="submit" class="a-button a-button--primary -without-icon w-100 mb-0">
                <span class="a-button__label"><?= lang('ScpAuth.requestAccess.requestBtn') ?></span>
            </button>

        </form>
    </div>
</div>
<?php $this->endSection() ?>
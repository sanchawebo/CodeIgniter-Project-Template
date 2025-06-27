<?php

use CodeIgniter\View\View;

/**
 * @var View $this
 */
?>
<?php $this->section('title') ?>
<?= lang('Settings.title') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\Settings\Views\layout'); ?>
<?php $this->section('main'); ?>


<form action="<?= site_url(ADMIN_AREA . '/settings/general') ?>" method="post">
    <?= csrf_field() ?>

    <fieldset class="border-0 m-0 mt-5 p-0">
        <legend class="fs-3 mb-4">
            <?= lang('Settings.general.head') ?>
        </legend>
        <!-- Site Online? -->
        <div class="row my-3">
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="siteOnline"
                        id="siteOnline"
                        value="1"
                        <?php if (old('siteOnline', setting('Site.siteOnline') ?? false)) : ?> checked <?php endif ?> />
                    <label class="form-check-label" for="siteOnline">
                        <?= lang('Settings.general.checkLabel') ?> - <?= lang('Settings.general.checkHelper') ?>
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="d-flex justify-content-start mt-4">
        <button type="submit" value="Save Settings" class="btn btn-primary">
            <?= lang('Settings.saveSettings') ?>
        </button>
    </div>
</form>


<?php $this->endSection() ?>

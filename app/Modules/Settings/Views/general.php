<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?php $this->section('title') ?>
<?= lang('Settings.pageTitle') ?>
<?php $this->endSection() ?>
<!-- Change the html-title in the above section. -->

<?php $this->extend('Mpr\Settings\Views\layout'); ?>
<?php $this->section('main'); ?>
    

<form action="<?= site_url(ADMIN_AREA . '/settings/general') ?>" method="post">
    <?= csrf_field() ?>

    <fieldset class="border-0 m-0 mt-5 p-0">
        <legend class="a-legend -size-l">
            <?= lang('Settings.general.head') ?>
        </legend>
        <!-- Site Online? -->
        <div class="row my-3">
            <div class="col-12">
                <div class="a-checkbox">
                    <input type="checkbox" name="siteOnline"
                        id="siteOnline"
                        value="1"
                        <?php if (old('siteOnline', setting('Site.siteOnline') ?? false)) : ?> checked <?php endif ?> />
                    <label for="siteOnline">
                        <?= lang('Settings.general.checkLabel') ?> - <?= lang('Settings.general.checkHelper') ?>
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    
    <div class="hstack justify-content-start mt-6">
        <button type="submit" value="Save Settings" class="a-button a-button--primary -without-icon">
        <span
            class="a-button__label"><?= lang('Settings.saveSettings') ?></span>
        </button>
    </div>
</form>


<?php $this->endSection() ?>

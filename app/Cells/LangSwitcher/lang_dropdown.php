<?php
/**
 * @var array $languages
 */
helper('form');
?>
<div class="d-block">
    <?= validation_show_error('lang', 'single_full') ?>
    <form action="<?= route_to('post-change-lang') ?>" method="POST">
        <div class="hstack gap-2 align-items-center">
            <i class="fa-solid fa-globe"></i>
            <?= csrf_field() ?>
            <select class="form-select"
                aria-label="<?= lang('Basic.langSwitcher.title') ?>"
                name="lang"
                hx-post="<?= route_to('post-change-lang') ?>"
                hx-target="html">
                <?php foreach ($languages as $lang): ?>
                    <?php if (session('lang') === $lang['lang_code']): ?>

                    <?php endif; ?>
                    <option value="<?= $lang['lang_code'] ?>"
                        <?= (session('lang') === $lang['lang_code']) ? 'selected' : '' ?>>
                        <?= $lang['display_name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <noscript>
                <button type="submit" class="btn btn-secondary m-0 ms-3">
                    <?= lang('Basic.langSwitcher.btn') ?>
                </button>
            </noscript>
        </div>
    </form>
</div>
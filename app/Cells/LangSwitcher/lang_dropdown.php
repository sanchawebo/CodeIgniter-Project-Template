<?php
/**
 * @var array $languages
 */
helper('form');
?>
<div class="d-block me-5">
    <?= validation_show_error('lang', 'single_full') ?>
    <form action="<?= route_to('post-change-lang') ?>" method="POST">
        <div class="m-language-selector align-items-center">
            <i class="a-icon boschicon-bosch-ic-chat-language" title="<?= lang('ScpBasic.langSwitcher.title') ?>"></i>
            <?= csrf_field() ?>
            <div class="a-dropdown">
                <select aria-label="<?= lang('ScpBasic.langSwitcher.title') ?>"
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
            </div>
            <noscript>
                <button type="submit" class="a-button a-button--secondary -without-icon m-0 ms-3">
                    <span class="a-button__label"><?= lang('ScpBasic.langSwitcher.btn') ?></span>
                </button>
            </noscript>
        </div>
    </form>
</div>
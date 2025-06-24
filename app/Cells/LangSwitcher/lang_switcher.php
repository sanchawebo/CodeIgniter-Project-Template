<?php
/**
 * @var array $languages
 */
?>
<div class="lang-switcher_context-menu">
    <button type="button" class="a-button a-button--integrated -without-label lang-switcher-trigger"
        aria-haspopup="true" aria-label="<?= lang('ScpBasic.langSwitcher.open') ?>">
        <i class="a-icon a-button__icon boschicon-bosch-ic-chat-language" title="<?= lang('ScpBasic.langSwitcher.open') ?>"></i>
    </button>
    <nav class="o-context-menu" aria-label="<?= lang('ScpBasic.langSwitcher.title') ?>" aria-hidden="false">
        <div class="m-popover">
            <div class="a-box -floating">
                <div class="m-popover__content">
                    <ul class="o-context-menu__menuItems" role="menubar">
                        <li class="a-menu-item" role="none">
                            <div class="a-menu-item__head">
                                <span
                                    class="a-menu-item__label"><?= lang('ScpBasic.langSwitcher.availableLangs') ?></span>
                            </div>
                        </li>
                        <?php foreach ($languages as $lang): ?>
                            <li class="a-menu-item" role="none">
                                <div class="a-menu-item__wrapper">
                                    <a href="<?= route_to('change-lang', $lang['lang_code']) ?>"
                                        role="menuitem" class="a-menu-item__link" aria-disabled="false">
                                        <span
                                            class="a-menu-item__label"><?= $lang['display_name'] ?></span>
                                    </a>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
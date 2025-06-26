<?php
/**
 * @var array $tabs
 */
?>
<div class="a-tab-navigation__wrapper">
    <div class="a-tab-navigation__gradients"></div>
    <ol class="a-tab-navigation" role="tablist">
        <?php foreach ($tabs as $tab) : ?>
            <?php if (empty($tab->permission) || auth()->user()->can($tab->permission)) : ?>
                <li class="a-tab-navigation__item" role="none">
                    <a class="a-tab-navigation__tab <?php if (url_is($tab->url)) : ?> active <?php endif ?>"
                       href="<?= esc($tab->url, 'attr') ?>"
                       tabindex="0"
                       role="tab">
                        <span class="a-tab-navigation__tab-content">
                            <span class="a-tab-navigation__label"><?= esc($tab->title) ?></span>
                        </span>
                    </a>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ol>
</div>

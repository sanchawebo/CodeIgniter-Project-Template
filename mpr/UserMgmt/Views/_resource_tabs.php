<?php
/**
 * @var array $tabs
 */
?>
<ul class="nav nav-tabs" role="tablist">
    <?php foreach ($tabs as $tab) : ?>
        <?php if (empty($tab->permission) || auth()->user()->can($tab->permission)) : ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link<?php if (url_is($tab->url)) : ?> active<?php endif ?>"
                   href="<?= esc($tab->url, 'attr') ?>"
                   <?php if (url_is($tab->url)) : ?>aria-current="page"<?php endif ?>
                   role="tab">
                    <?= esc($tab->title) ?>
                </a>
            </li>
        <?php endif ?>
    <?php endforeach ?>
</ul>

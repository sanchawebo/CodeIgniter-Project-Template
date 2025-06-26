<?php
/**
 * @var string $selectedTab
 */
?>

<div class="a-tab-navigation__wrapper">
    <div class="a-tab-navigation__gradients"></div>
    <ol class="a-tab-navigation" role="tablist">
        <li class="a-tab-navigation__item" role="none">
            <button hx-get="<?= route_to('profile-tab-settings') ?>" hx-push-url="true" hx-target="body" type="button" class="a-tab-navigation__tab <?=($selectedTab === 'settings') ? '-selected' : '' ?>" tabindex="0" role="tab" aria-controls="tab-content-1" id="tab-content-1">
                <span class="a-tab-navigation__tab-content">
                    <span class="a-tab-navigation__label"><?= lang('Profile.tabs.settings') ?></span>
                </span>
            </button>
        </li>
        <li class="a-tab-navigation__item" role="none">
            <button hx-get="<?= route_to('profile-tab-address') ?>" hx-push-url="true" type="button" class="a-tab-navigation__tab <?=($selectedTab === 'address') ? '-selected' : '' ?>" tabindex="0" role="tab" aria-controls="tab-content-2" id="tab-content-2">
                <span class="a-tab-navigation__tab-content">
                    <span class="a-tab-navigation__label"><?= lang('Profile.tabs.address') ?></span>
                </span>
            </button>
        </li>
        <li class="a-tab-navigation__item" role="none">
            <button hx-get="<?= route_to('profile-tab-logo') ?>" hx-push-url="true" type="button" class="a-tab-navigation__tab <?=($selectedTab === 'logo') ? '-selected' : '' ?>" tabindex="0" role="tab" aria-controls="tab-content-2" id="tab-content-2">
                <span class="a-tab-navigation__tab-content">
                    <span class="a-tab-navigation__label"><?= lang('Profile.tabs.logo') ?></span>
                </span>
            </button>
        </li>
    </ol>
</div>
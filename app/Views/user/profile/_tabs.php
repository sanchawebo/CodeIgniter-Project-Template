<?php
/**
 * @var string $selectedTab
 */
?>

<div class="container my-3">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button 
                class="nav-link <?=($selectedTab === 'settings') ? 'active' : '' ?>" 
                id="settings-tab" 
                data-bs-toggle="tab" 
                type="button" 
                role="tab"
                hx-get="<?= route_to('profile-tab-settings') ?>" 
                hx-push-url="true" 
                hx-target="body"
                aria-controls="settings"
                aria-selected="<?=($selectedTab === 'settings') ? 'true' : 'false' ?>"
            >
                <i class="fas fa-cog"></i> <?= lang('Profile.tabs.settings') ?>
            </button>
        </li>
    </ul>
</div>
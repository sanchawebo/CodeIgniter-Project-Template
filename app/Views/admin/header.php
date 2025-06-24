<?php

/**
 * @var CodeIgniter\View\View $this
 */
helper('url');
?>
<header class="o-minimal-header -primary -detached" hx-boost="true" hx-push-url="true">
  <div class="o-minimal-header__supergraphic"></div>
  <div class="o-minimal-header__top ps-0">
    <div class="o-minimal-header__title ps-3 ms-0">
      <?php $this->renderSection('title') ?>
    </div>
    <!-- Header Buttons -->
    <ul class="o-minimal-header__actions">
      <li>
        <?= view_cell('LangSwitcher/LangSwitcherCell') ?>
      </li>
      <li>
        <a href="<?= route_to('profile') ?>" class="frontend-kit__header__link">
          <button type="button" class="a-button a-button--integrated">
            <i class="a-icon a-button__icon boschicon-bosch-ic-my-brand-frame" title="my-brand-frame"></i>
            <div class="a-button__label"><?= auth()->user()->first_name ?? 'Person', ' ', auth()->user()->last_name ?? 'Doe' ?></div>
          </button>
        </a>
      </li>
      <li>
        <button id="theme-switcher" type="button" class="a-button a-button--integrated -without-label">
          <i class="a-icon a-button__icon boschicon-bosch-ic-sun-moon" title="<?= lang('ScpBasic.themeSwitcher') ?>"></i>
        </button>
      </li>
    </ul>
    <a href="<?= route_to('dashboard') ?>" hx-boost="false" class="o-minimal-header__logo" aria-label="Bosch Logo">
      <svg width="108px" height="24px" viewBox="0 0 108 24" xmlns="http://www.w3.org/2000/svg">
        <path id="bosch-logo-text" d="M78.19916,15.03735c0,3.46057-3.1618,5.1535-6.12445,5.1535c-3.41083,0-5.17847-1.29462-6.57263-2.96265 l2.51453-2.48962c1.07056,1.36926,2.46472,2.0415,4.0083,2.0415c1.29462,0,2.14105-0.62244,2.14105-1.56848 c0-0.99585-0.77179-1.31952-2.83813-1.74274l-0.54773-0.12451c-2.48962-0.52283-4.53113-1.91699-4.53113-4.75519 c0-3.112,2.53943-4.97925,5.87549-4.97925c2.8382,0,4.65564,1.21991,5.77594,2.48962l-2.46472,2.43988 c-0.82831-0.91748-2.00061-1.44946-3.23651-1.46893c-0.89624,0-1.91699,0.42328-1.91699,1.46893 c0,0.97095,1.07056,1.31946,2.41492,1.59332l0.54773,0.12451C75.51038,10.73029,78.24896,11.42737,78.19916,15.03735z  M64.80499,11.92529c0,4.65558-2.66394,8.29047-7.26971,8.29047c-4.58093,0-7.26971-3.63489-7.26971-8.29047 c0-4.63068,2.68878-8.29047,7.26971-8.29047C62.14105,3.63483,64.80499,7.29462,64.80499,11.92529z M60.92114,11.92529 c0-2.46472-1.1452-4.48132-3.38586-4.48132s-3.36102,1.9917-3.36102,4.48132s1.12036,4.50623,3.36102,4.50623 S60.92114,14.43982,60.92114,11.92529z M87.06226,16.43152c-1.74274,0-3.56018-1.44397-3.56018-4.60583 c0-2.81323,1.69293-4.38171,3.46057-4.38171c1.39423,0,2.21576,0.64728,2.8631,1.76764l3.18671-2.11621 c-1.59338-2.41492-3.48547-3.43567-6.09961-3.43567c-4.78009,0-7.36926,3.70953-7.36926,8.19086 c0,4.70544,2.86304,8.39008,7.31946,8.39008c3.13696,0,4.63074-1.09546,6.24902-3.43567l-3.21167-2.16602 C89.25311,15.68463,88.55603,16.43152,87.06226,16.43152z M48.97095,15.46057c0,2.66388-2.43982,4.40662-4.92944,4.40662H35.9502 V4.0332h7.44397c2.8382,0,4.9046,1.44397,4.9046,4.35681c0.01666,1.43036-0.85675,2.72058-2.19086,3.23651 C46.10791,11.65143,48.97095,12.29877,48.97095,15.46057z M39.80914,10.25726h2.83813 c0.02155,0.00134,0.04309,0.00226,0.06464,0.00269c0.81476,0.01575,1.48804-0.6319,1.50385-1.44666 c0.00342-0.0567,0.00342-0.11353,0-0.17017c-0.047-0.77802-0.71576-1.37061-1.49377-1.32361h-2.88794L39.80914,10.25726z  M44.76349,14.98755c0-0.92114-0.67218-1.54358-2.09131-1.54358h-2.81323v3.11206h2.88794 C43.91699,16.55603,44.76349,16.13275,44.76349,14.98755z M103.64313,4.03326v5.82568H98.8382V4.03326h-4.15771v15.83398h4.15771 v-6.24896h4.80493v6.24896h4.15771V4.03326H103.64313z" />
        <path id="bosch-logo-anker" d="M12,0C5.37256,0,0,5.37256,0,12c0,6.62738,5.37256,12,12,12s12-5.37262,12-12C23.99646,5.37402,18.62598,0.00354,12,0z  M12,22.87964C5.99133,22.87964,1.12036,18.00867,1.12036,12S5.99133,1.1203,12,1.1203S22.87964,5.99133,22.87964,12 C22.87354,18.0061,18.0061,22.87354,12,22.87964z M19.50293,7.05475c-0.66852-1.01306-1.53552-1.88-2.54858-2.54852h-0.82159 v4.10785H7.89209V4.50623H7.04565c-4.13873,2.73114-5.27972,8.30029-2.54858,12.43896 c0.66852,1.01306,1.53552,1.88007,2.54858,2.54858h0.84644v-4.10791h8.24066v4.10791h0.82159 C21.09308,16.76257,22.23407,11.19348,19.50293,7.05475z M6.74689,17.87549c-3.24493-2.88354-3.5379-7.85168-0.65436-11.09668 c0.20508-0.23077,0.42358-0.44928,0.65436-0.65436V17.87549z M16.13275,14.24066H7.89209V9.73444h8.24066V14.24066z  M17.84827,17.25549c-0.18768,0.2088-0.38629,0.40747-0.59515,0.59509v-2.48962V8.61407V6.12445 C20.49121,9.03387,20.75763,14.0174,17.84827,17.25549z" />
      </svg>
    </a>
  </div>
</header>
<nav class="m-side-navigation -contrast -open -detached" aria-label="Side Navigation" aria-hidden="false">
  <div class="m-side-navigation__header">
    <div class="m-side-navigation__header__label -size-l highlight">
      <?= lang('ScpBasic.siteTitle') ?>
    </div>
  </div>
  <!-- Sidebar Links -->
  <ul class="m-side-navigation__menuItems" role="menubar">
    <li class="a-menu-item mb-4 <?= isExactUriSelected('admin-dashboard', true) ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('admin-dashboard') ?>" hx-boost="false" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-desktop-dashboard" title="<?= lang('ScpAdmin.dashboard.title') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.dashboard.title') ?></span>
        </a>
      </div>
    </li>
    <?php if (auth()->user()->can('users.list', 'users.activate')): ?>
      <li class="a-menu-item mb-3" role="none">
        <div class="a-menu-item__wrapper">
          <button type="button" class="a-menu-item__group" aria-disabled="false" role="menuitem"
            _="
            on load
              set :group to closest <li.a-menu-item/>
              if length of <li.a-menu-item.-selected/> in :group > 0
                add .-open to closest <div.a-menu-item__wrapper/>
              end
            end
            on click
              toggle .-open on closest <div.a-menu-item__wrapper/>
            end"
          >
            <i class="a-icon boschicon-bosch-ic-people" title="Group"></i>
            <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.users.group') ?></span>
            <i class="a-icon arrow boschicon-bosch-ic-down" title="down"></i>
          </button>
        </div>
        <ul class="m-side-navigation__menuSubitems" role="menu">
          <?php if (auth()->user()->can('users.list')): ?>
            <li class="a-menu-item -indent <?= isPartialUriSelected('user-list', true, 'UserController::activateShow') ?>" role="none">
              <div class="a-menu-item__wrapper">
                <a href="<?= route_to('user-list') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
                  <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.users.list') ?></span>
                </a>
              </div>
            </li>
          <?php endif; ?>
          <?php if (auth()->user()->can('users.activate')): ?>
            <li class="a-menu-item -indent <?= isExactUriSelected('UserController::activateShow') ?>" role="none">
              <div class="a-menu-item__wrapper">
                <a href="<?= route_to('UserController::activateShow') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
                  <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.users.activate') ?></span>
                </a>
              </div>
            </li>
          <?php endif; ?>
          </ul>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.feedback')): ?>
      <li class="a-menu-item mb-3 <?= isExactUriSelected('admin-feedback') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('admin-feedback') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-wishlist" title="<?= lang('ScpAdmin.sidebar.feedback') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.feedback') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.settings')): ?>
      <li class="a-menu-item mb-3 <?= isExactUriSelected('general-settings') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('general-settings') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-settings-editor" title="<?= lang('Settings.title') ?>"></i>
          <span class="a-menu-item__label"><?= lang('Settings.title') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.errors')): ?>
      <li class="a-menu-item mb-3 <?= isExactUriSelected('error-logs') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('error-logs') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-alert-error" title="<?= lang('ScpAdmin.sidebar.error-logs') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.error-logs') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.db')): ?>
      <li class="a-menu-item <?= isExactUriSelected('migration') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('migration') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-core-data" title="<?= lang('ScpAdmin.sidebar.migrations') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.migrations') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.db')): ?>
      <li class="a-menu-item mb-3 <?= isExactUriSelected('seeding') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('seeding') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-watermelon" title="<?= lang('ScpAdmin.sidebar.seeding') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.seeding') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.testing')): ?>
      <li class="a-menu-item <?= isExactUriSelected('PriintApiTestController::index') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('PriintApiTestController::index') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-cloud-share" title="<?= lang('ScpAdmin.sidebar.api') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.api') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.testing')): ?>
      <li class="a-menu-item mb-3 <?= isExactUriSelected('test') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('test') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-test-tube" title="<?= lang('ScpAdmin.sidebar.test') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.test') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.testing')): ?>
      <li class="a-menu-item <?= isExactUriSelected('xmlPriint') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('start-import-categories') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-test-tube" title="<?= lang('ScpAdmin.sidebar.xmlPriint') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.xmlPriint') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <?php if (auth()->user()->can('admin.testing')): ?>
      <li class="a-menu-item <?= isExactUriSelected('start-import-groups') ?>" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('start-import-groups') ?>" role="menuitem" class="a-menu-item__link" tabindex="-1">
          <i class="a-icon boschicon-bosch-ic-test-tube" title="<?= lang('ScpAdmin.sidebar.xmlTest') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.xmlTest') ?></span>
        </a>
      </div>
      </li>
    <?php endif; ?>
    <!-- Back to generator -->
    <li class="a-menu-item mt-5" role="none">
      <div class="a-menu-item__wrapper">
        <a href="<?= route_to('dashboard') ?>" role="menuitem" class="a-menu-item__link" hx-boost="false">
          <i class="a-icon boschicon-bosch-ic-back-menu" title="<?= lang('ScpAdmin.sidebar.back') ?>"></i>
          <span class="a-menu-item__label"><?= lang('ScpAdmin.sidebar.back') ?></span>
        </a>
      </div>
    </li>
  </ul>
</nav>
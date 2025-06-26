<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<nav class="nav navbar bg-body-tertiary">
  <div class="container-fluid gap-3">
    <!-- Burger/Menu Button -->
    <button class="nav-link" type="button"  
        data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Offcanvas Sidebar -->
    <?= $this->include('templates/sidebar') ?>

    <!-- Logo -->
    <a class="navbar-brand" href="<?= route_to('dashboard') ?>"><?= SITE_NAME ?></a>

    <!-- Title Section -->
    <span class="navbar-text mx-3">
      <?= $this->renderSection('title') ?>
    </span>

    <!-- Navbar Content -->
    <ul class="navbar-nav flex-row ms-auto gap-3">
      <?= view_cell('LangSwitcher/LangSwitcherCell') ?>
      <li class="nav-item">
        <a href="<?= route_to('profile') ?>" class="nav-link px-2">
          <i class="fa-solid fa-user me-2"></i>
          <?= auth()->user()->first_name ?? 'Person' ?> <?= auth()->user()->last_name ?? 'Doe' ?>
        </a>
      </li>
      <li class="nav-item">
        <button id="theme-switcher" type="button" class="nav-link px-2">
          <i class="fa-solid fa-circle-half-stroke" title="<?= lang('Basic.themeSwitcher') ?>"></i>
        </button>
      </li>
    </ul>
  </div>
</nav>

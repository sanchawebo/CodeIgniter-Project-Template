<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0">
  <meta name="robots" content="noindex">

  <?php helper(['html', 'vite']); ?>
  <?= viteTags('css'); ?>
  <?= viteTags('js'); ?>
  <script src="/assets/js/_hyperscript.min.js"></script>
  <script src="/assets/js/theme-switcher.js"></script>
  <title><?= $this->renderSection('title') ?> | <?= SITE_NAME ?></title>
</head>

<body class="d-flex vh-100 align-items-center bg-primary bg-gradient">
  <div class="container-fluid">
    <main role="main" class="">
      <?= $this->renderSection('main') ?>
    </main>
  </div>

  <?= $this->renderSection('pageScripts') ?>
</body>

</html>

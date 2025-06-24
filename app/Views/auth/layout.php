<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0">
  <meta name="robots" content="noindex">

  <?php helper(['html', 'vite']); ?>
  <?= link_tag('assets/frok/v01-frontend-kit.css') ?>
  <?= viteTags('css'); ?>
  <?= viteTags('js'); ?>
  <script src="https://unpkg.com/hyperscript.org@0.9.12"></script>
  <title><?php $this->renderSection('title') ?></title>
</head>

<body class="bg-supergraphic">
  <div class="e-container">
    <main id="main-wrapper" role="main">
      <?php $this->renderSection('main') ?>
    </main>
  </div>

  <?= script_tag('assets/frok/v01-frontend-kit.js') ?>
  <?php $this->renderSection('pageScripts') ?>
</body>

</html>

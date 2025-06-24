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
  <?= viteTags('css'); ?>
  <?= viteTags('js'); ?>
  <script src="/assets/js/_hyperscript.min.js"></script>
  <title><?php $this->renderSection('title') ?></title>
</head>

<body>
  <main role="main">
    <?= $this->renderSection('main') ?>
  </main>

  <?php $this->renderSection('pageScripts') ?>
</body>

</html>

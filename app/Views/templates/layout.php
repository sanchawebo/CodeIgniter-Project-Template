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

  <?= helper(['html', 'vite']); ?>
  <?= viteTags('css'); ?>
  <title><?= $this->renderSection('title') ?></title>
</head>

<body>
  <main role="main">
    <?= $this->renderSection('main') ?>
  </main>

  <?= viteTags('js'); ?>
  <?= $this->renderSection('pageScripts') ?>
</body>

</html>

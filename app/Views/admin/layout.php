<?php
/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 */
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0">
  <meta name="robots" content="noindex">

  <?php helper(['html', 'vite']); ?>
  <?= link_tag('assets/frok/v01-frontend-kit.css') ?>
  <?= viteTags('css'); ?>
  <?= viteTags('js'); ?>
  <script src="/assets/js/_hyperscript.min.js"></script>
  <script src="/assets/js/theme-switcher.js"></script>
  <?php $this->fragment('pageTitle') ?>
    <title><?= $this->renderSection('pageTitle') ?></title>
  <?php $this->endFragment() ?>
</head>

<?php $this->fragment('body') ?>
  <body class="-light-mode" _="on every htmx:beforeSend in <button:not(.no-disable)/> 
                              tell it 
                                toggle @disabled until htmx:afterOnLoad">
    <?php if (! setting('Site.siteOnline')): ?>
      <?= view('admin/_offlineBanner') ?>
    <?php endif; ?>
    <div id="admin-wrapper">
      <?= $this->include('admin/header') ?>
      <main role="main">
        <div class="e-container"><?= $this->renderSection('main') ?></div>
      </main>
    </div>

    <div id="alerts-wrapper" class="position-fixed z-index-1100 bottom-0 end-0 pe-none p-3"></div>
    <?= script_tag('assets/frok/v01-frontend-kit.js') ?>
    <?= $this->renderSection('pageScripts') ?>
  </body>
<?php $this->endFragment() ?>

</html>

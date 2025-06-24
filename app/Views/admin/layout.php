<?php
/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
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
  <?php $this->fragment('pageTitle') ?>
    <title><?php $this->renderSection('pageTitle') ?></title>
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
        <div class="e-container"><?php $this->renderSection('main') ?></div>
      </main>
    </div>

    <div id="alerts-wrapper" class="position-fixed z-index-1200 bottom-0 end-0 p-3">
      {alerts}
    </div>
    <?= script_tag('assets/frok/v01-frontend-kit.js') ?>
    <?php $this->renderSection('pageScripts') ?>
  </body>
<?php $this->endFragment() ?>

</html>

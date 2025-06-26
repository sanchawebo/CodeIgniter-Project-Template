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

  <?php helper(['html', 'vite']); ?>
  <?= viteTags('css'); ?>
  <?= viteTags('js'); ?>
  <title><?= $this->renderSection('title') ?></title>
  <script src="/assets/js/_hyperscript.min.js"></script>
  <script src="/assets/js/theme-switcher.js"></script>
  <?= $this->renderSection('pageStyles') ?>
</head>

<?php $this->fragment('body') ?>
  <body
    _="on every htmx:beforeSend in <button:not(.no-disable)/> tell it toggle @disabled until htmx:afterOnLoad"
  >
    <div id="content-wrapper" class="bg-body">
      <?= $this->include('templates/header') ?>
      <main role="main" class="pt-8">
        <?= $this->renderSection('main') ?>
      </main>
      <?= $this->include('templates/footer') ?>
    </div>

    <script>
        document.querySelector('.alert.alert-danger')?.scrollIntoView({behavior: 'smooth'});
    </script>
    <?= $this->renderSection('pageScripts') ?>
  </body>
<?php $this->endFragment() ?>

</html>

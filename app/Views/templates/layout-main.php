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
    <?php $this->section('title') ?>
        <title><?= $this->renderSection('title', true) ?> | <?= SITE_NAME ?></title>
    <?php $this->endSection() ?>
    <script src="/assets/js/_hyperscript.min.js"></script>
    <script src="/assets/js/theme-switcher.js"></script>
    <?= $this->renderSection('pageStyles') ?>
</head>

<?php $this->fragment('body') ?>

<body
    _="on every htmx:beforeSend in <button:not(.no-disable)/> tell it toggle @disabled until htmx:afterOnLoad">
    <?php if (! setting('Site.siteOnline')): ?>
        <?= view('admin/_offlineBanner') ?>
    <?php endif; ?>
    <div id="content-wrapper" class="bg-body">
        <?= $this->include('templates/header') ?>
        <?= $this->renderSection('sidebar') ?>
        <main role="main" class="container-fluid pt-3">
            <?= $this->renderSection('main') ?>
        </main>
        <?= $this->include('templates/footer') ?>
    </div>

    <div id="alerts-wrapper" class="position-fixed z-index-1100 bottom-0 end-0 pe-none p-3"></div>
    <?= $this->renderSection('pageScripts') ?>
</body>
<?php $this->endFragment() ?>

</html>
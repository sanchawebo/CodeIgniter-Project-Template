<?php
/**
 * @var CodeIgniter\View\View $this
 * @var array                 $migrations
 * @var array                 $migrationHistory
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.migrations.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
<?= lang('ScpAdmin.migrations.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div>
    <?= frok_notification('warning', 'Be careful when running migrations. Backup db-data if unsure!') ?>
    
    <h1 class="fs-3">Files:</h1>
    <?php if (! empty($migrations)) : ?>
        <div class="overflow-x-auto -turquoise">
            <?php
            $template = [
                'table_open' => '<table class="m-table">',
            ];
            $table = new CodeIgniter\View\Table($template);
            $table->setHeading(array_keys($migrations[array_key_first($migrations)]));
    
            foreach ($migrations as $key) {
                $table->addRow($key);
            }
            echo $table->generate() ?>
        </div>
        <div class="m-3 a-link a-link--button">
            <a href="<?= route_to('migrate-all') ?>" title="Runs all latest Migrations">
                <span>Migrate latest</span>
            </a>
        </div>
    <?php else : ?>
        <p class="fst-italic">None</p>
    <?php endif; ?>
    
    <h2 class="fs-4 pt-3">Migration History:</h2>
    <?php if (! empty($migrationHistory)) : ?>
        <div class="overflow-auto">
        <?php
            $template = [
                'table_open' => '<table class="m-table">',
            ];
            $table = new CodeIgniter\View\Table($template);
            $table->setHeading(array_keys($migrationHistory[0] ?? []));
    
            foreach ($migrationHistory as $key) {
                $table->addRow($key);
            }
            echo $table->generate() ?>
        </div>
    <?php else : ?>
        <p class="fst-italic">None</p>
    <?php endif; ?>
</div>


<?php $this->endSection() ?>
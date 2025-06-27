<?php
/**
 * @var CodeIgniter\View\View $this
 * @var array                 $migrations
 * @var array                 $migrationHistory
 */
?>

<?php $this->section('title') ?>
<?= lang('Admin.migrations.title') ?>
<?php $this->endSection() ?>

<?php $this->extend('templates/layout-admin'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>

<div>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        Be careful when running migrations. Backup db-data if unsure!
    </div>

    <h1 class="fs-3">Files:</h1>
    <?php if (! empty($migrations)) : ?>
        <div class="table-responsive">
            <?php
            $template = [
                'table_open' => '<table class="table table-striped table-bordered align-middle">',
            ];
            $table = new CodeIgniter\View\Table($template);
            $table->setHeading(array_keys($migrations[array_key_first($migrations)]));

            foreach ($migrations as $row) {
                $table->addRow($row);
            }
            echo $table->generate();
            ?>
        </div>
        <div class="my-3">
            <a href="<?= route_to('migrate-all') ?>" class="btn btn-primary" title="Runs all latest Migrations">
                <i class="fas fa-play me-1"></i>
                <span>Migrate latest</span>
            </a>
        </div>
    <?php else : ?>
        <p class="fst-italic">None</p>
    <?php endif; ?>

    <h2 class="fs-4 pt-3">Migration History:</h2>
    <?php if (! empty($migrationHistory)) : ?>
        <div class="table-responsive">
            <?php
            $template = [
                'table_open' => '<table class="table table-striped table-bordered align-middle">',
            ];
            $table = new CodeIgniter\View\Table($template);
            $table->setHeading(array_keys($migrationHistory[0] ?? []));

            foreach ($migrationHistory as $row) {
                $table->addRow($row);
            }
            echo $table->generate();
            ?>
        </div>
    <?php else : ?>
        <p class="fst-italic">None</p>
    <?php endif; ?>
</div>


<?php $this->endSection() ?>
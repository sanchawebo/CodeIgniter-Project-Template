<?php

/**
 * @var \Michalsn\CodeIgniterHtmx\View\View      $this
 * @var App\Libraries\PriintApi\TicketStatusData $ticketStatus
 * @var string                                   $ticketId
 */
?>
<?php $this->section('pageTitle') ?>
<?= lang('ScpAdmin.api.pageTitle') ?>
<?php $this->endSection() ?>
<?php $this->section('title') ?>
Test Ticket Status
<?php $this->endSection() ?>

<?php $this->extend('admin/layout'); ?>
<?php $this->section('main'); ?>
<?php helper('html'); ?>


<div class="e-container">
    <?php $this->fragment('status') ?>
        <?php if ($isSuccess ?? false): ?>
            <div>
        <?php else: ?>
            <div hx-get="<?= route_to('PriintApiTestController::getTicketStatus', $ticketId) ?>"
            hx-target="#ticket-status-wrapper"
            hx-swap="innerHTML"
            hx-trigger="every 5s"
            >
        <?php endif; ?>
                <ul class="a-list a-list--dot">
                    <?php foreach ((array) $ticketStatus as $key => $value): ?>
                        <li><?= esc($key) . ': ' . esc($value) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
    <?php $this->endFragment() ?>
</div>

<?php $this->endSection() ?>

<?php $this->section('pageScripts') ?>
<?php $this->endSection() ?>

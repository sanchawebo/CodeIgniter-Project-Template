<?php
/**
 * @var array|null $steps
 */
?>
<dialog class="m-dialog -floating-shadow-s -floating" 
    id="alert-dialog-warning-<?= $steps['orderType'] ?? 'base' ?>"
    aria-labelledby="dialog-alert-dialog-warning-title">
    <div class="m-dialog__remark --warning"></div>
    <div class="m-dialog__header">
        <i class="a-icon ui-ic-alert-warning" title="warning"></i>
        <div class="m-dialog__title"><?= lang('Dashboard.deleteModal.header') ?></div>
        <button type="button" class="a-button a-button--integrated -without-label" data-frok-action="close" aria-label="close dialog">
            <i class="a-icon a-button__icon ui-ic-close" title="close"></i>
        </button>
    </div>
    <hr class="a-divider" />
    <div class="m-dialog__content">
        <div class="m-dialog__headline" id="dialog-alert-dialog-warning-title">
        <?= lang('Dashboard.deleteModal.headline') ?>
        </div>
        <div class="m-dialog__body" id="dialog-alert-dialog-warning-description">
            <?= lang('Dashboard.deleteModal.body') ?>
        </div>
        <div class="m-dialog__actions">
            <form hx-post="<?= route_to('delete-order') ?>"
                hx-target="#tile-dashboard-<?= $steps['orderType'] ?? 'base' ?>"
                hx-swap="outerHTML"
                hx-trigger="submit"
                hx-push-url="false"
                >
                <?= csrf_field_with_wrapper() ?>
                <input type="hidden" name="order_id" value="<?= $steps['orderId'] ?? null ?>">
                <input type="hidden" name="order_type" value="<?= $steps['orderType'] ?? null ?>">
                <button type="submit"
                    value="confirm"
                    class="a-button a-button--primary -without-icon"
                    data-frok-action="confirm">
                    <span class="a-button__label"><?= lang('Dashboard.deleteModal.confirm') ?></span>
                </button>
                <button type="button"
                    value="cancel"
                    formmethod="dialog"
                    class="a-button a-button--secondary -without-icon"
                    data-frok-action="cancel">
                    <span class="a-button__label"><?= lang('Dashboard.deleteModal.cancel') ?></span>
                </button>
            </form>
        </div>
    </div>
</dialog>
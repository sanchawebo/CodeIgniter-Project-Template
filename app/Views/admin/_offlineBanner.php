<div class="a-notification a-notification--banner -show -warning position-fixed start-auto w-auto end-0 bottom-0 z-4 m-3" role="alert">
    <i class="a-icon ui-ic-alert-warning" title="Warning"></i>
    <div id="notification-label-id-bar-warning-warning" class="a-notification__content">
        <?= lang('ScpBasic.offlineNotice') ?>
        <a href="<?= route_to('general-settings') ?>"><?= lang('ScpBasic.here') ?></a>.
    </div>
    <button
        type="button"
        class="a-button a-button--integrated -without-label"
        aria-label="close banner"
        _="on click transition .a-notification's opacity to 0 then remove closest .a-notification"
    >
        <i class="a-icon a-button__icon ui-ic-close" title="close"></i>
    </button>
</div>
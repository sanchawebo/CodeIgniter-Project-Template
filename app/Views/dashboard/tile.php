<?php
/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 * @var string                              $routeTo
 * @var string                              $imgName
 * @var string                              $partialLangString
 * @var array|null                          $steps
 */
?>
<div id="tile-dashboard-<?= $steps['orderType'] ?? 'base' ?>">
    <div class="a-tile a-tile__dashboard -secondary">
        <a href="<?= route_to($routeTo) ?>"
            class="a-tile__link"
            target="_self">
            <figure class="a-image">
                <div class="a-image__ratioWrapper">
                    <?= file_get_contents(PUBLICPATH . '/assets/img/' . $imgName) ?>
                </div>
            </figure>
            <div class="a-text p-5 pb-0 <?= (isset($steps)) ? 'mb-3' : 'mb-5' ?>">
                <h3 class="-size-xl mb-2 mt-0">
                    <?php // ! Needs to be on one line ?>
                    <?= lang('Dashboard.catalogueSection.' . $partialLangString . 'Head') ?><div class="d-inline text-nowrap">&nbsp;<i class="a-icon ui-ic-inline-right-bold ms-1 align-baseline fs-4 d-inline-block" title="inline-right-bold"></i></div>
                </h3>
                <p class="-size-m m-0">
                    <?= lang('Dashboard.catalogueSection.' . $partialLangString . 'Sub') ?>
                </p>
            </div>
        </a>
        <?php if (isset($steps)): ?>
            <div class="a-notification -neutral px-5 py-1 mt-3" role="alert">
                <div class="a-notification__content flex-grow-1 hstack justify-content-between" >
                    <?= lang(
                        'Dashboard.catalogueSection.activeOrder',
                        [$steps['latestStep'], $steps['maxStep']]
                    ) ?>
                    <button
                        type="button"
                        class="a-button a-button--integrated -without-label -extend-clickable-area-x"
                        aria-label="<?= lang('Dashboard.catalogueSection.deleteOrder') ?>"
                        data-tooltip="<?= lang('Dashboard.catalogueSection.deleteOrder') ?>"
                        data-tooltip-width="dynamic"
                        _="
                            on load
                                set :modal to #alert-dialog-warning-<?= $steps['orderType'] ?? 'base' ?>
                            on click
                                call :modal.showModal()">
                        <i class="a-icon a-button__icon boschicon-bosch-ic-delete px-0"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?= $this->include('dashboard/_delete_order_modal', null, false) ?>
</div>
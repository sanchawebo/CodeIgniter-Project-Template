<?php

/**
 * @var App\Entities\FeedbackEntity $feedback
 * @var string                      $topic
 */
?>
<td>
    <div class="vstack gap-3 justify-content-start h-100">
        <div>
            <?= lang('ScpFeedback.rating') ?>:
            <br>
            <div class="a-rating a-rating--small a-rating--no-hover">
                <div class="a-rating__star-container">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if ($i <= $feedback->rating($topic)): ?>
                            <i class="a-icon ui-ic-nosafe-star-fill" title="nosafe-star-fill"></i>
                        <?php else: ?>
                            <i class="a-icon ui-ic-nosafe-star" title="nosafe-star"></i>
                        <?php endif; ?>
                    <?php endfor ?>
                </div>
            </div>
        </div>
        <div>
            <?= lang('ScpFeedback.notes') ?>:
            <br>
            <?= esc($feedback->notes($topic)) ?>
        </div>
    </div>
</td>
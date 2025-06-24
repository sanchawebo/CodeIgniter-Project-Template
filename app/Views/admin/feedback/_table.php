<?php
/**
 * @var CodeIgniter\View\View              $this
 * @var array<App\Entities\FeedbackEntity> $feedbacks
 */
?>
<table class="m-table -dynamic-height">
  <thead>
    <tr>
        <th><?= lang('ScpFeedback.user') ?></th>
        <th><?= lang('ScpFeedback.functionality') ?></th>
        <th><?= lang('ScpFeedback.usability') ?></th>
        <th><?= lang('ScpFeedback.customisation') ?></th>
        <th><?= lang('ScpFeedback.performance') ?></th>
        <th><?= lang('ScpFeedback.quality') ?></th>
        <th><?= lang('ScpFeedback.frontpage') ?></th>
        <th><?= lang('ScpFeedback.remarks') ?></th>
    </tr>
  </thead>
  <tbody class="align-text-top">
    <?php $index = 0; ?>
    <?php foreach ($feedbacks as $feedback): ?>
      <tr <?= ($index % 2 === 0) ? 'class="-secondary"' : '' ?>>
        <td>
          <div class="vstack gap-3 justify-content-start word-wrap">
            <div>
              <?= $feedback->user()->first_name ?>
              <?= $feedback->user()->last_name ?>
              </div>
              <div><?= $feedback->user()->email ?></div>
              <?php if ($feedback->user()->deleted_at !== null): ?>
                <div class="fst-italic -size-s">
                  <i class="a-icon ui-ic-alert-info me-1" title="alert-info" style="font-size: 1rem;"></i><?= lang('Users.deletedAt', [$feedback->user()->deleted_at]) ?>
                </div>
              <?php endif; ?>
            </div>
        </td>
        <?= view(
          'admin/feedback/_topic_block',
          ['topic'=> 'functionality', 'feedback' => $feedback]
        ) ?>
        <?= view(
          'admin/feedback/_topic_block',
          ['topic'=> 'usability', 'feedback' => $feedback]
        ) ?>
        <?= view(
          'admin/feedback/_topic_block',
          ['topic'=> 'customisation', 'feedback' => $feedback]
        ) ?>
        <?= view(
          'admin/feedback/_topic_block',
          ['topic'=> 'performance', 'feedback' => $feedback]
        ) ?>
        <?= view(
          'admin/feedback/_topic_block',
          ['topic'=> 'quality', 'feedback' => $feedback]
        ) ?>
        <?= view(
          'admin/feedback/_topic_block',
          ['topic'=> 'frontpage', 'feedback' => $feedback]
        ) ?>
        <td><?= esc($feedback->remarks) ?></td>
      </tr>
    <?php $index++; ?>
    <?php endforeach ?>
  </tbody>
</table>

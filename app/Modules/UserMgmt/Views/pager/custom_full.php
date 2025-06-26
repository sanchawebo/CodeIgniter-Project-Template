<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(5);
?>

<div class="a-page-indicator a-page-indicator--numbered"
	role="navigation"
	aria-label="<?= lang('ScpPager.pageNavigation') ?>">
	<?php if ($pager->hasPreviousPage()) : ?>
		<a class="a-page-indicator__caret -left"
			href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('ScpPager.previous') ?>"
			aria-label="<?= lang('ScpPager.previous') ?>">
		</a>
	<?php else: ?>
		<a class="a-page-indicator__caret -left -disabled"
			href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('ScpPager.previous') ?>"
			aria-label="<?= lang('ScpPager.previous') ?>">
		</a>
	<?php endif ?>

	<div class="a-page-indicator__container">
		<?php foreach ($pager->links() as $link) : ?>
			<a class="a-page-indicator__indicator <?= $link['active'] ? '-selected' : '' ?>"
				href="<?= $link['uri'] ?>">
				<?= $link['title'] ?>
			</a>
		<?php endforeach ?>
	</div>

	<?php if ($pager->hasNextPage()) : ?>
		<a class="a-page-indicator__caret -right"
			href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('ScpPager.next') ?>"
			aria-label="<?= lang('ScpPager.next') ?>">
		</a>
	<?php else: ?>
		<a class="a-page-indicator__caret -right -disabled"
			href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('ScpPager.next') ?>"
			aria-label="<?= lang('ScpPager.next') ?>">
		</a>
	<?php endif ?>
</div>

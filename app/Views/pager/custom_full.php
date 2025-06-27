<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(5);
?>

<nav aria-label="<?= lang('ScpPager.pageNavigation') ?>">
	<ul class="pagination justify-content-center">
		<?php if ($pager->hasPreviousPage()) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('ScpPager.previous') ?>">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
		<?php else: ?>
			<li class="page-item disabled">
				<span class="page-link" aria-label="<?= lang('ScpPager.previous') ?>">
					<span aria-hidden="true">&laquo;</span>
				</span>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li class="page-item <?= $link['active'] ? 'active' : '' ?>">
				<a class="page-link" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNextPage()) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('ScpPager.next') ?>">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		<?php else: ?>
			<li class="page-item disabled">
				<span class="page-link" aria-label="<?= lang('ScpPager.next') ?>">
					<span aria-hidden="true">&raquo;</span>
				</span>
			</li>
		<?php endif ?>
	</ul>
</nav>

<?php
/**
 * @var array $alerts
 */
?>
<?php foreach ($alerts as $alert): ?>
	<?php [$class, $content] = $alert; ?>
	<div
		_="on load wait 10 seconds then transition opacity to 0 then remove me"
		class="a-notification a-notification--banner -<?= $class ?> -show w-50 end-0"
		style="left:auto;"
		role="alert"
		aria-live="assertive"
		aria-atomic="true"
	>
		<i class="a-icon ui-ic-alert-<?= $class ?>"></i>
		<div class="a-notification__content">
			<?= esc($content) ?>
		</div>
		<button
			type="button"
			class="a-button a-button--integrated -without-label"
			_="on click remove closest .a-notification"
			aria-label="close banner"
		>
			<i class="a-icon a-button__icon ui-ic-close" title="close"></i>
		</button>
	</div>
<?php endforeach; ?>

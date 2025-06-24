<?php if (! empty($errors)): ?>
    <div class="a-notification a-notification--text -error" role="alert">
        <i class="a-icon ui-ic-alert-error" title="Error"></i>
        <div class="a-notification__content">
            <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
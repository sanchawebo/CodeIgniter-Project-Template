<?php if (! empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
        <?php foreach ($errors as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>
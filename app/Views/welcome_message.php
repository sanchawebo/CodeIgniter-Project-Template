<?php
/**
 * @var \Michalsn\CodeIgniterHtmx\View\View $this
 */
?>
<!-- HEADER: MENU + HEROE SECTION -->
<section>

    <div class="bg-dark-subtle px-5 py-7">

        <h1>Welcome to CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?> Project Template</h1>

        <h2 class="fs-5 text-wrap-balance">The perfect entry point for your projects, utilizing <a href="https://shield.codeigniter.com" class="text-reset">CI Shield</a>, <a href="https://htmx.org" class="text-reset">htmx</a>, <a href="https://hyperscript.org" class="text-reset">_hyperscript</a> and <a href="https://getbootstrap.com" class="text-reset">Bootstrap 5</a></h2>

    </div>

</section>

<!-- CONTENT -->

<section class="p-5">

    <h2>Installation</h2>
    <ol>
        <li>Run <code>composer install</code></li>
        <li>Run <code>npm install</code></li>
        <li>Run <code>php spark migrate --all</code></li>
        <li>Run <code>php spark db:seed OmniSeeder</code></li>
    </ol>


    <h3>Initial Configuration</h3>
    <ol>
        <li><strong>$baseUrl</strong>: Set your base URL to <code>$baseURL</code>. If you need more flexibility, the baseURL may be set within the <strong>.env</strong> file as <code>app.baseURL = 'http://example.com/'</code>. Always use a trailing slash on your base URL!</li>
        <li><strong>$indexPage</strong>: If you don't want to include <strong>index.php</strong> in your site URIs, set <code>$indexPage</code> to <code>''</code>. The setting will be used when the framework generates your site URIs.</li>
        <li><strong>Change <code>SITE_NAME</code></strong> in <code>app/Config/Constants.php</code> to your site's name.</li>
        <li><strong>Configure Database Connection Settings</strong>: Set your database settings in the <strong>.env</strong> file using keys like <code>database.default.hostname</code>, <code>database.default.database</code>, <code>database.default.username</code>, and <code>database.default.password</code>.</li>
        <li><strong>Set to Development Mode</strong>: Set <code>CI_ENVIRONMENT = development</code> in your <strong>.env</strong> file to enable debugging tools.</li>
        <li><strong>Email</strong>: Configure email settings in your <strong>.env</strong> file using keys like <code>email.fromEmail</code>, <code>email.fromName</code>, <code>email.SMTPHost</code>, <code>email.SMTPUser</code>, and <code>email.SMTPPass</code> for Shield to send emails.</li>
        <li><strong>Set Writable Folder Permission</strong>: If you will be running your site using a web server (e.g., Apache or nginx), you will need to modify the permissions for the writable folder inside your project, so that it is writable by the user or account used by your web server.</li>
    </ol>

</section>

<section class="p-5">
    <h2>Theme Colors</h2>
    <?php
    // Bootstrap theme colors as defined in variables.production.scss
    $themeColors = [
        'primary-dark',
        'primary',
        'primary-light',
        'primary-lighter',
        'primary-subtle',
        'secondary',
        'secondary-lightish',
        'secondary-light',
        'secondary-lighter',
        'success-dark',
        'success',
        'success-light',
        'success-subtle',
        'info',
        'info-subtle',
        'warning',
        'warning-subtle',
        'danger',
        'danger-light',
        'danger-subtle',
        'light',
        'dark',
        'black',
        'flieder',
        'purple',
    ];
    ?>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        <?php foreach ($themeColors as $color): ?>
            <div class="col">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body p-2">
                        <div class="rounded mb-2"
                            style="height: 40px; background-color: var(--bs-<?= esc($color) ?>); border: 1px solid #ddd;">
                        </div>
                        <small class="text-capitalize"><?= esc($color) ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <div class="p-5 bg-dark-subtle">

        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div>
</section>

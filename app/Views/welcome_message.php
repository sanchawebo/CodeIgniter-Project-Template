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
    </ol>


    <h3>Initial Configuration</h3>
    <ol>
        <li><strong>$baseUrl</strong>: Set your base URL to <code>$baseURL</code>. If you need more flexibility, the baseURL may be set within the <strong>.env</strong> file as <code>app.baseURL = 'http://example.com/'</code>. Always use a trailing slash on your base URL!</li>
        <li><strong>$indexPage</strong>: If you don't want to include <strong>index.php</strong> in your site URIs, set <code>$indexPage</code> to <code>''</code>. The setting will be used when the framework generates your site URIs.</li>
        <li><strong>Configure Database Connection Settings</strong>: If you intend to use a database, open the <strong>app/Config/Database.php</strong> file with a text editor and set your database settings. Alternately, these could be set in your <strong>.env</strong> file.</li>
        <li><strong>Set to Development Mode</strong>: If it is not on the production server, set <code>CI_ENVIRONMENT</code> to <code>development</code> in <strong>.env</strong> file to take advantage of the debugging tools provided.</li>
        <li><strong>Set Writable Folder Permission</strong>: If you will be running your site using a web server (e.g., Apache or nginx), you will need to modify the permissions for the writable folder inside your project, so that it is writable by the user or account used by your web server.</li>
        <li><strong>Email</strong>: Configure <code>app/Config/Email.php</code> to allow Shield to send emails.</li>
        <li><strong>Change <code>SITE_NAME</code></strong> in <code>app/Config/Constants.php</code> to your site's name.</li>
    </ol>

</section>

<section>
    <div class="p-5 bg-dark-subtle">

        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div>
</section>

# CodeIgniter 4 Project Template

## Installation
1. Run `composer install`
2. Run `npm install`
3. Run `php spark migrate --all`


### Initial Configuration
1. `$baseUrl`: Set your base URL to `$baseURL`. If you need more flexibility, the baseURL may be set within the **.env** file as `app.baseURL = 'http://example.com/'`. Always use a trailing slash on your base URL!
2. `$indexPage`: If you don't want to include **index.php** in your site URIs, set `$indexPage` to `''`. The setting will be used when the framework generates your site URIs.
3. Configure Database Connection Settings: If you intend to use a database, open the **app/Config/Database.php** file with a text editor and set your database settings. Alternately, these could be set in your **.env** file.
4. Set to Development Mode: If it is not on the production server, set `CI_ENVIRONMENT` to `development` in **.env** file to take advantage of the debugging tools provided.
5. Set Writable Folder Permission: If you will be running your site using a web server (e.g., Apache or nginx), you will need to modify the permissions for the writable folder inside your project, so that it is writable by the user or account used by your web server.
6. Email: Configure `app/Config/Email.php` to allow Shield to send emails.
7. Change `SITE_NAME` in `app/Config/Constants.php` to your sites name.
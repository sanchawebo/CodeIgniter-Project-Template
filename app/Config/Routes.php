<?php

use App\Controllers\Admin\AdminController;
use App\Controllers\Admin\ErrorLogController;
use App\Controllers\Admin\LangMgmtController;
use App\Controllers\Admin\MigrationController;
use App\Controllers\Admin\SeederController;
use App\Controllers\Admin\TestController;
use App\Controllers\Home;
use App\Controllers\LanguageController;
use App\Controllers\LoginController;
use App\Controllers\ProfileController;
use App\Controllers\RegisterController;
use App\Controllers\ResetPasswordController;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLoginController;
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegisterController;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', ['filter' => 'permission:admin.access'], static function (RouteCollection $routes) {
    $routes->view('completion-final', 'segmentCatalogue/manualCreation/completion_final');
    $routes->view('magic-link-email', 'auth/email/magic_link_email');
    $routes->view('email-activate-email', 'auth/email/email_activate_email');
    $routes->view('email-activated-email', 'auth/email/email_activated_email');
    $routes->view('php-info', 'admin/php_info');
    $routes->group('language', ['filter' => 'permission:admin.language'], static function (RouteCollection $routes) {
        $routes->get('export', [LangMgmtController::class, 'export'], ['as' => 'lang-export']);
        $routes->get('import', [LangMgmtController::class, 'import'], ['as' => 'lang-import']);
        $routes->get('/', [LangMgmtController::class, 'index']);
    });
    $routes->group('test', ['filter' => 'permission:admin.testing'], static function (RouteCollection $routes) {
        $routes->get('/', [TestController::class, 'index'], ['as' => 'test']);
    });
    $routes->group('migration', ['filter' => 'permission:admin.db'], static function (RouteCollection $routes) {
        $routes->get('all', [MigrationController::class, 'migrateAll'], ['as' => 'migrate-all']);
        $routes->post('single', [MigrationController::class, 'migrateSingle'], ['as' => 'migrate-single']);
        $routes->get('/', [MigrationController::class, 'index'], ['as' => 'migration']);
        $routes->get('seed/(:segment)', [SeederController::class, 'runSeeder'], ['as' => 'seed-single']);
        $routes->get('seed', [SeederController::class, 'index'], ['as' => 'seeding']);
    });
    $routes->group('users', static function (RouteCollection $routes) {
        $routes->post('delete-user', [UserController::class, 'deleteHandle'], ['filter' => 'permission:users.delete']);
        $routes->post('activate-user', [UserController::class, 'activateHandle'], ['filter' => 'permission:users.activate']);
        $routes->get('activate-users', [UserController::class, 'activateShow'], ['filter' => 'permission:users.activate']);
    });
    $routes->get('error-logs/(:segment)', [ErrorLogController::class, 'view'], ['filter' => 'permission:admin.errors', 'as' => 'single-log']);
    $routes->get('error-logs', [ErrorLogController::class, 'index'], ['filter' => 'permission:admin.errors', 'as' => 'error-logs']);
    $routes->get('/', [AdminController::class, 'index'], ['as' => 'admin-dashboard']);
});

$routes->group('profile', static function (RouteCollection $routes) {
    $routes->post('settings/password', [ProfileController::class, 'tabSettingsPassword'], ['as' => 'profile-tab-settings-password']);
    $routes->post('settings/lang', [ProfileController::class, 'tabSettingsLang'], ['as' => 'profile-tab-settings-lang']);
    $routes->get('settings', [ProfileController::class, 'tabSettings'], ['as' => 'profile-tab-settings']);
    $routes->get('/', [ProfileController::class, 'tabSettings'], ['as' => 'profile']);
});

$routes->get('change-language/(:alpha)', [LanguageController::class, 'changeLang'], ['as' => 'change-lang']);
$routes->post('change-language', [LanguageController::class, 'postChangeLang'], ['as' => 'post-change-lang']);

$routes->group('reset-password', static function (RouteCollection $routes) {
    $routes->post('/', [ResetPasswordController::class, 'resetPassword'], ['as' => 'reset-password-post']);
    $routes->get('/', [ResetPasswordController::class, 'show'], ['as' => 'reset-password-form']);
});

$routes->get('site-offline', static function () {
    helper('setting');

    // If it's not offline, but they've refreshed the page
    // take to the site home page.
    if (! site_offline()) {
        return redirect()->to('/');
    }

    return view(config('Site')->siteOfflineView);
});

$routes->get('/', [Home::class, 'index'], ['as' => 'dashboard']);

// Custom routes for shield
$routes->get('login', [LoginController::class, 'loginView']);
$routes->post('login', [ShieldLoginController::class, 'loginAction']);
$routes->get('register', [RegisterController::class, 'registerView']);
$routes->post('register', [ShieldRegisterController::class, 'registerAction']);

// @phpstan-ignore codeigniter.unknownServiceMethod
// @phpstan-ignore method.nonObject
service('auth')->routes($routes, ['except' => ['login', 'register']]);

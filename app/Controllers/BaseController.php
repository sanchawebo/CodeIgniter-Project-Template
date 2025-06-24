<?php

namespace App\Controllers;

use App\Models\UserSettingsModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use Michalsn\CodeIgniterHtmx\HTTP\Response;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * Instance of the main Response object.
     *
     * @var Response
     */
    protected $response;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['html', 'htmx'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->setLocale();
    }

    protected function setLocale()
    {
        /** @see https://stackoverflow.com/questions/60250996/how-to-set-specific-language-for-all-pages-in-codeigniter-4 */
        $session  = Services::session();
        $language = Services::language();
        if (! isset($session->lang)) {
            $userSettings = model(UserSettingsModel::class);
            $prefLang     = $userSettings->getLang(auth()->id());
            if ($prefLang !== null) {
                $lang = $prefLang;
                $session->set('lang', $prefLang);
            }
        } else {
            // @phpstan-ignore-next-line
            $lang = $session?->lang;
        }
        $language->setLocale($lang ?? 'en');
    }

    /**
     * Returns view() or view_fragment()
     * - Normal Request: return view as is
     * - HTMX Request: return the specified (default `body`) fragment
     */
    protected function returnFragment(string $viewName, array $data = [], string $fragmentName = 'body')
    {
        if ($this->request->is('htmx')) {
            if ($fragmentName === 'body') {
                // Return the <title>-fragment to change the page title.
                $fragmentName = ['pageTitle', 'body'];
            }

            return view_fragment($viewName, $fragmentName, $data);
        }

        return view($viewName, $data);
    }

    protected function oobCsrfSwap(): string
    {
        return sprintf('<div hx-swap-oob="true:#csrfTokenWrapper">
            %s
        </div>', csrf_field());
    }
}

<?php

namespace Mpr\Settings\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;

/**
 * General Site Settings
 */
class GeneralSettingsController extends BaseController
{
    protected $viewPrefix = 'Mpr\Settings\Views\\';

    /**
     * Displays the site's general settings.
     */
    public function general()
    {
        return view($this->viewPrefix . 'general');
    }

    /**
     * Saves the general settings
     *
     * @return RedirectResponse
     */
    public function saveGeneral()
    {
        setting('Site.siteOnline', $this->request->getPost('siteOnline'));

        return redirect()->to(ADMIN_AREA . '/settings/general')->with('message', lang('Settings.resourceSaved'));
    }
}

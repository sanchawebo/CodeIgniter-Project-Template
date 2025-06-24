<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Site extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Site Online?
     * --------------------------------------------------------------------------
     *
     * When false, only superadmins and user groups with permission will be
     * able to view the site. All others will see the "System Offline" page.
     */
    public bool $siteOnline = false;

    /**
     * --------------------------------------------------------------------------
     * Site Offline View
     * --------------------------------------------------------------------------
     *
     * The view file that is displayed when the site is offline.
     */
    public string $siteOfflineView = 'site_offline';
}

<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://codeigniter4.github.io/shield/quick_start_guide/using_authorization/#change-available-groups for more info
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin-mpr' => [
            'title'       => 'MPR Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'admin-koki' => [
            'title'       => 'Koki Admin',
            'description' => 'Can grant access and view analytics/feedback',
        ],
        'user-koki' => [
            'title'       => 'Koki User',
            'description' => 'Can grant access to new dealers',
        ],
        'user' => [
            'title'       => 'Dealer',
            'description' => 'Can generate PDFs.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'      => 'Can access the sites admin area',
        'admin.api'         => 'Can access API features',
        'admin.db'          => 'Can access database features (migrations/seeders)',
        'admin.errors'      => 'Can access error logs',
        'admin.testing'     => 'Can access test/debug site',
        'admin.settings'    => 'Can access the main site settings',
        'admin.feedback'    => 'Can access feedback analytics',
        'users.activate'    => 'Can activate registering users',
        'users.delete'      => 'Can delete existing non-admin users',
        'site.view-offline' => 'Can view the site even in offline mode',
        'beta.access'       => 'Can access beta-level features',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'beta.*',
            'me.*',
            'site.*',
            'users.*',
        ],
        'admin-mpr' => [
            'admin.access',
            'admin.feedback',
            'beta.*',
            'me.*',
            'users.list',
            'users.create',
            'users.edit',
            'users.settings',
            'users.activate',
        ],
        'admin-koki' => [
            'admin.access',
            'admin.feedback',
            'users.activate',
            'users.list',
        ],
        'user-koki' => [
            'admin.access',
            'users.activate',
        ],
        'user' => [],
    ];
}

<?php

namespace UserMgmt\Entities;

use CodeIgniter\Shield\Entities\User as ShieldUser;

class User extends ShieldUser
{
    /**
     * @return string
     */
    public function adminLink(?string $postfix = null)
    {
        $url = '/' . ADMIN_AREA . "/users/{$this->id}";

        if (! empty($postfix)) {
            $url .= "/{$postfix}";
        }

        return trim(site_url($url));
    }

    /**
     * Returns a list of the groups the user is involved in.
     */
    public function groupsList(): string
    {
        $config = setting('AuthGroups.groups');
        $groups = $this->getGroups();

        $out = [];

        foreach ($groups as $group) {
            $out[] = $config[$group]['title'];
        }

        return implode(', ', $out);
    }
}

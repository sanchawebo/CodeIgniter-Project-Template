<?php

namespace Mpr\UserMgmt\Models;

use App\Models\UserModel as AppUserModel;
use Mpr\UserMgmt\Entities\User;

class UserModel extends AppUserModel
{
    protected $returnType = User::class;

    /**
     * Compiles a user search query which looks for the given search term
     * in the username and email(secret) fields.
     */
    public function search(string $searchTerm): self
    {
        $searchTerm = str_replace('_', '!_', $searchTerm);

        $this
            ->select($this->table . '.*')
            ->join(
                setting('Auth.tables')['identities'],
                sprintf('%1$s.user_id = %2$s.id', setting('Auth.tables')['identities'], setting('Auth.tables')['users']),
                'inner',
            )
            ->groupStart()
            ->like('secret', $searchTerm, 'both', true, true)
            ->orLike('username', $searchTerm, 'both', true, true)
            ->groupEnd();

        return $this;
    }

    /**
     * Compiles a WHERE IN statement for the given groups.
     *
     * @param list<string> $groups
     */
    public function whereInUserGroups(array $groups): self
    {
        $tableName = $this->table;

        $hideHiddenUsers = (! in_array('superadmin', $groups, true) || ! in_array('admin-mpr', $groups, true));
        $this
            ->select($tableName . '.*')
            ->join(
                setting('Auth.tables')['groups_users'],
                sprintf('%1$s.user_id = %2$s.id', setting('Auth.tables')['groups_users'], setting('Auth.tables')['users']),
                'inner',
            )
            ->whereIn(setting('Auth.tables')['groups_users'] . '.group', $groups)
            ->when($hideHiddenUsers, static function ($query, $hideHiddenUsers) use ($tableName) {
                $query
                    ->groupStart()
                    ->where($tableName . '.status !=', 'hidden')
                    ->orWhere($tableName . '.status IS NULL')
                    ->groupEnd();
            })
            ->orderBy('FIELD(' . setting('Auth.tables')['groups_users'] . '.group, "' . implode('", "', array_keys(setting('AuthGroups.groups'))) . '")', 'ASC', false)
            ->orderBy($tableName . '.first_name')
            ->orderBy($tableName . '.last_name');

        return $this;
    }
}

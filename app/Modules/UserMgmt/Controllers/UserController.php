<?php

namespace UserMgmt\Controllers;

use App\Controllers\BaseController;
use App\Models\CountryModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Models\LoginModel;
use CodeIgniter\Shield\Models\UserIdentityModel;
use ReflectionException;
use UserMgmt\Entities\User;
use UserMgmt\Models\UserModel;

class UserController extends BaseController
{
    public const PER_PAGE = 15;

    protected $viewPrefix = 'UserMgmt\Views\\';
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Display the users currently in the system.
     *
     * @return RedirectResponse|string
     */
    public function list()
    {
        if (! auth()->user()->can('users.list')) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        $view = $this->request->is('post')
            ? $this->viewPrefix . '_table'
            : $this->viewPrefix . 'list';
        $users = $this->userModel
            ->whereInUserGroups($this->getLowerGroups())
            ->paginate(self::PER_PAGE);

        return view($view, [
            'headers' => $this->getTableHeaders(),
            'users'   => $users,
            'pager'   => $this->userModel->pager,
        ]);
    }

    /**
     * Display the "new user" form.
     */
    public function create()
    {
        if (! auth()->user()->can('users.create')) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        $groups = setting('AuthGroups.groups');
        asort($groups);

        return view($this->viewPrefix . 'form', [
            'groups' => $groups,
        ]);
    }

    /**
     * Display the Edit form for a single user.
     *
     * @return RedirectResponse|string
     */
    public function edit(int $userId)
    {
        // check if it's the current user
        $itsMe = (auth()->user()->can('me.edit') || auth()->user()->can('me.security')) && auth()->id() === $userId;
        // check if the user should be granted access
        if (! auth()->user()->can('users.edit') && ! $itsMe) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }

        /** @var User|null */
        $user = $this->userModel->find($userId);
        if ($user === null) {
            return redirect()->back()->with('error', lang('Users.resourceNotFound'));
        }
        // check if the user is an admin and can be edited
        if ($user->inGroup('superadmin', 'admin-mpr')
            && ! auth()->user()->can('users.manage-admins')
            && ! $itsMe) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }

        $groups = config('AuthGroups')->groups;
        // Only superadmins can assign this role
        if (! $user->inGroup('superadmin')) {
            unset($groups['superadmin']);
        }

        return view($this->viewPrefix . 'form', [
            'user'        => $user,
            'groups'      => $groups,
            'countryList' => model(CountryModel::class)->findAllForSelect(),
        ]);
    }

    /**
     * Creates or saves the basic user details.
     *
     * @return RedirectResponse|void
     *
     * @throws ReflectionException
     */
    public function save(?int $userId = null)
    {
        // check if it's the current user
        $itsMe = auth()->user()->can('me.edit') && auth()->id() === $userId;
        // check if the user should be permitted access
        if (! auth()->user()->can('users.edit') && ! $itsMe) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }

        /**
         * @var User $user
         */
        $user = $userId !== null
            ? $this->userModel->find($userId)
            : new User();

        // @phpstan-ignore-next-line
        if ($user === null) {
            return redirect()->back()->withInput()->with('error', lang('Users.resourceNotFound'));
        }

        // check if the user is an admin and can be edited
        if ($user->inGroup('superadmin', 'admin-mpr')
            && ! auth()->user()->can('users.manage-admins')
            && ! $itsMe) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        if (! $this->validate('userMgmt_user')) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Fill in basic details
        $user->fill($this->request->getPost());

        // Save basic details
        $this->userModel->save($user);

        // We need an ID to on the entity to save groups.
        if ($user->id === null) {
            $user->id = $this->userModel->getInsertID();
        }

        // Save the new user's email/password
        $password = $this->request->getPost('password');
        $identity = $user->getEmailIdentity();
        if ($identity === null) {
            helper('text');
            $user->createEmailIdentity([
                'email'    => $this->request->getPost('email'),
                'password' => ! empty($password) ? $password : random_string('alnum', 12),
            ]);
        }
        // Update existing user's email identity
        else {
            $identity->secret = $this->request->getPost('email');
            if ($password !== null) {
                // @phpstan-ignore-next-line -- service('passwords') comes from CIShield
                $identity->secret2 = service('passwords')->hash($password);
            }
            if ($identity->hasChanged()) {
                $userIdentModel = new UserIdentityModel();
                $userIdentModel->save($identity);
            }
        }

        // Save the user's groups if the user has right permissions
        if (auth()->user()->can('users.edit')) {
            $postGroup = $this->request->getPost('group') ?? '';
            // Only superadmins can assign this role
            if ($postGroup !== 'superadmin' || auth()->user()->inGroup('superadmin')) {
                $user->syncGroups($postGroup);
            }
        }

        return redirect()->to($user->adminLink())->with('success', lang('Users.resourceSaved'));
    }

    /**
     * Change user's password.
     *
     * @return RedirectResponse|void
     *
     * @throws ReflectionException
     */
    public function changePassword(?int $userId = null)
    {
        $itsMe = auth()->user()->can('me.security') && auth()->id() === $userId;
        if (! auth()->user()->can('users.edit') && ! $itsMe) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }
        /**
         * @var User
         */
        $user = $userId !== null
            ? $this->userModel->find($userId)
            : new User();

        /** @phpstan-ignore-next-line */
        if ($user === null) {
            return redirect()->back()->withInput()->with('error', lang('Users.resourceNotFound'));
        }
        // check if the user is an admin and can be edited
        if ($user->inGroup('superadmin', 'admin-mpr')
            && ! auth()->user()->can('users.manage-admins')
            && ! $itsMe) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }

        if (! $this->validate(['password' => 'required|strong_password', 'pass_confirm' => 'required|matches[password]'])) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        // Save the new user's email/password
        $password = $this->request->getPost('password');
        $identity = $user->getEmailIdentity();

        if ($password !== null) {
            // @phpstan-ignore-next-line -- service('passwords') comes from CIShield
            $identity->secret2 = service('passwords')->hash($password);
        }

        if ($identity->hasChanged()) {
            $userIdentModel = new UserIdentityModel();
            $userIdentModel->save($identity);
        }

        return redirect()->to($user->adminLink('/security'))->with('success', lang('Users.resourceSaved'));
    }

    /**
     * Delete the specified user.
     *
     * @return RedirectResponse
     */
    public function delete(int $userId)
    {
        if (! auth()->user()->can('users.delete')) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }

        /** @var User|null $user */
        $user = $this->userModel->find($userId);

        if ($user === null) {
            return redirect()->back()->with('error', lang('Users.resourceNotFound'));
        }

        if (! $this->userModel->delete($user->id)) {
            log_message('error', implode(' ', $this->userModel->errors()));

            return redirect()->back()->with('error', lang('Users.unknownError'));
        }

        return redirect()->back()->with('message', lang('Users.resourceDeleted'));
    }

    /**
     * Deletes multiple users from the database.
     * Called via the checked() records in the table.
     */
    public function deleteBatch()
    {
        if (! auth()->user()->can('users.delete')) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }

        $ids = $this->request->getPost('selects');

        if (empty($ids)) {
            return redirect()->back()->with('error', lang('Users.resourcesNotSelected'));
        }
        $ids = array_keys($ids);

        if (! $this->userModel->delete($ids)) {
            log_message('error', implode(' ', $this->userModel->errors()));

            return redirect()->back()->with('error', lang('Users.unknownError'));
        }

        return redirect()->back()->with('message', lang('Users.resourcesDeleted'));
    }

    /**
     * Displays basic security info, like previous login info,
     * and ability to force a password reset, ban, etc.
     *
     * @return RedirectResponse|string
     */
    public function security(int $userId)
    {
        $itsMe = auth()->user()->can('me.security') && auth()->id() === $userId;
        if (! auth()->user()->can('users.edit') && ! $itsMe) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        /** @var User|null $user */
        $user = $this->userModel->find($userId);
        if ($user === null) {
            return redirect()->back()->with('error', lang('Users.resourceNotFound'));
        }

        // check if the user is an admin and can be edited
        if ($user->inGroup('superadmin', 'admin-mpr')
            && ! auth()->user()->can('users.manage-admins')
            && ! $itsMe) {
            return redirect()->back()->with('error', lang('Users.notAuthorized'));
        }

        /** @var LoginModel $loginModel */
        $loginModel = new LoginModel();
        $logins     = $loginModel->where('identifier', $user->email)->orderBy('date', 'desc')->limit(20)->findAll();

        return view($this->viewPrefix . 'security', [
            'user'   => $user,
            'logins' => $logins,
        ]);
    }

    /**
     * Displays the user's permissions.
     *
     * @return RedirectResponse|string
     */
    public function permissions(int $userId)
    {
        $itsMe = auth()->user()->can('me.security') && auth()->id() === $userId;
        if (! auth()->user()->can('users.edit') && ! $itsMe) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        $user = $this->userModel->find($userId);
        if ($user === null) {
            return redirect()->back()->with('error', lang('Users.resourceNotFound'));
        }

        // check if the user is an admin and can be edited
        if ($user->inGroup('superadmin', 'admin-mpr')
            && ! auth()->user()->can('users.manage-admins')
            && ! $itsMe) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        $permissions = setting('AuthGroups.permissions');
        if (is_array($permissions)) {
            ksort($permissions);
        }

        return view($this->viewPrefix . 'permissions', [
            'user'        => $user,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Updates the permissions for a single user.
     *
     * @return RedirectResponse
     */
    public function savePermissions(int $userId)
    {
        $itsMe = auth()->user()->can('me.security') && auth()->id() === $userId;
        if (! auth()->user()->can('users.edit') && ! $itsMe) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        /** @var User|null $user */
        $user = $this->userModel->find($userId);
        if ($user === null) {
            return redirect()->back()->with('error', lang('Users.resourceNotFound'));
        }

        // check if the user is an admin and can be edited
        if ($user->inGroup('superadmin', 'admin-mpr')
            && ! auth()->user()->can('users.manage-admins')
            && ! $itsMe) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        $user->syncPermissions(...($this->request->getPost('permissions') ?? []));

        return redirect()->back()->with('success', lang('Users.permissions.saved'));
    }

    /**
     * Searches for users via username.
     *
     * @return RedirectResponse|string
     */
    public function search()
    {
        if (! auth()->user()->can('users.list')) {
            return redirect()->to('admin')->with('error', lang('Users.notAuthorized'));
        }

        if (! $this->validate([
            'search' => 'permit_empty|string',
        ])) {
            return redirect()->back()->withInput();
        }
        $searchTerm = $this->validator->getValidated()['search'];

        if ($searchTerm === '') {
            $this->response->setRetarget('body');

            return view($this->viewPrefix . 'list', [
                'headers' => $this->getTableHeaders(),
                'users'   => $this->userModel
                    ->whereInUserGroups($this->getLowerGroups())
                    ->paginate(self::PER_PAGE),
                'pager' => $this->userModel->pager,
            ]);
        }

        $users = $this->userModel
            ->search($searchTerm)
            ->whereInUserGroups($this->getLowerGroups())
            ->paginate(self::PER_PAGE);

        return view($this->viewPrefix . '_table', [
            'headers' => $this->getTableHeaders(),
            'users'   => $users,
            'pager'   => $this->userModel->pager,
        ]) . view($this->viewPrefix . '_search', ['oob' => true, 'searchTerm' => $searchTerm]);
    }

    private function getTableHeaders()
    {
        return [
            'email'       => lang('Users.email'),
            'username'    => lang('Users.username'),
            'groups'      => lang('Users.groups'),
            'last_active' => lang('Users.lastActive'),
        ];
    }

    /**
     * Returns a list with all auth-groups which are hierarchically lower than the user's groups.
     *
     * @return list
     */
    private function getLowerGroups(): array
    {
        $userGroups  = auth()->user()->getGroups();
        $allGroups   = config('AuthGroups')->groups;
        $lowerGroups = $allGroups;
        // Only superadmins can assign this role

        foreach ($allGroups as $groupName => $group) {
            if (! in_array($groupName, $userGroups, true)) {
                unset($lowerGroups[$groupName]);
            } else {
                break;
            }
        }

        return array_keys($lowerGroups);
    }
}

<?php

return [
    'pageTitle' => 'Profile | ' . SITE_NAME,
    'title'     => 'Profile',
    'tabs'      => [
        'settings' => 'Settings',
        'address'  => 'Addresses',
        'logo'     => 'Logos',
    ],
    'settings' => [
        'langHead'                => 'Interface Language',
        'langLabel'               => 'Language',
        'saveBtn'                 => 'Save',
        'passwordHead'            => 'Change Password',
        'passwordLabel'           => 'Password',
        'passwordOldLabel'        => 'Old Password',
        'passwordNewLabel'        => 'New Password',
        'passwordNewConfirmLabel' => 'New Password (again)',
    ],
    'success'          => 'Updated successfully',
    'errorOldPassword' => 'The Old Password field must match your current password.',
    'address'          => [
        'head'     => 'Your Addresses',
        'addTitle' => 'Add new Address',
    ],
    'logo' => [
        'head'     => 'Your Logos',
        'addTitle' => 'Upload new Logo',
    ],
];

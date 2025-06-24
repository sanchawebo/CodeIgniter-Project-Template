<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?= lang('Auth.emailActivate.emailSubject') ?></title>
</head>

<body>
    <h2><?= lang('Auth.emailActivate.emailSubject') ?></h1>
    <p><?= lang('Auth.emailActivate.emailBody') ?></p>
    <p>
        <?= lang('Auth.emailActivate.emailLink') ?> <a href="<?= url_to('UserController::activateShow') ?>"><?= url_to('UserController::activateShow') ?></a>
    </p>
    <br>
    <br>
    <b><?= lang('Auth.emailInfo') ?></b>
    <p><?= lang('Auth.email') ?>: <?= esc($userEmail ?? 'user@email.com') ?></p>
    <p><?= lang('Auth.emailDate') ?> <?= esc($date ?? 'd.m.Y') ?></p>
</body>

</html>

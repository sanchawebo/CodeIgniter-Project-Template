<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?= lang('ScpAuth.emailActivated.emailSubject') ?></title>
</head>

<body>
    <h2><?= lang('ScpAuth.emailActivated.emailSubject') ?></h2>
    <p><?= lang('ScpAuth.emailActivated.emailBody') ?></p>
    <p>
        <?= lang('ScpAuth.emailActivated.emailLink') ?> <a href="<?= url_to('login') ?>"><?= url_to('login') ?></a>
    </p>
</body>

</html>

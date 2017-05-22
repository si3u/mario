<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=mario',
            'username' => 'mario',
            'password' => 'mario',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
			'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailtrap.io',
                'username' => 'fa95e5e158f7cf',
                'password' => 'a78e240422a79e',
                'port' => '2525',
                'encryption' => null,
            ],
            'useFileTransport' => false,
        ],
    ],
];

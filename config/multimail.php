<?php

return [
    /*
    |--------------------------------------------------------------------------
    | List your email providers
    |--------------------------------------------------------------------------
    |
    | Enjoy a life with multimail
    |
    */

    'emails'  => [
        'office' =>
            [
              'pass'          => env('MAIL_PASSWORD'),
              'username'      => env('MAIL_USERNAME'),
              'from_mail'     => 'office@crazy.com',
              'from_name'     => "Max Musterman",
              'reply_to_mail' => 'reply@example.com',
            ],
        'contact'  =>
            [
              'pass'     => env('second_mail_password'),
              'username' => env('second_mail_username'),
            ],
    ],

    'provider' => [
      'default' =>
        [
          'host'      => env('MAIL_HOST'),
          'port'      => env('MAIL_PORT'),
          'encryption' => env('MAIL_ENCRYPTION'),
        ],
      'gmail' =>
      [
        'host'     =>env('GMAIL_HOST'),
        'port'      => env('GMAIL_PORT'),
        'encryption' => env('GMAIL_ENCRYPTION'),
      ],
      'mailtrap' =>
      [
        'host'     => env('TRAPMAIL_HOST'), 
        'port'      => env('TRAPMAIL_PORT'),
        'encryption' => env('TRAPMAIL_ENCRYPTION'),
      ]
    ],


];

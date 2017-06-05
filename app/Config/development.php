<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 8:42 PM
 */

return [
    'settings'  =>  [       // Slim App Configurations
        'httpVersion'                       => '1.1',
        'responseChunkSize'                 => 4096,
        'outputBuffering'                   => 'append',
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails'               => true,    // change to false on production
        'addContentLengthHeader'            => true,
        'routerCacheFile'                   => false
    ],
    'db'        =>  [       // DB Configurations
        'driver'                            =>  'mysql',
        'host'                              =>  'localhost',
        'database'                          =>  'ozf_cart',
        'username'                          =>  'bshara',
        'password'                          =>  'P@ssw0rd',
        'charset'                           =>  'utf8',
        'collation'                         =>  'utf8_unicode_ci',
        'prefix'                            =>  ''
    ],
    'app'       =>  [
        'siteName'                          =>  'authentication',
        'siteUrl'                           =>  '/',
        'hash'                              =>  [
            'algo'                  =>  PASSWORD_DEFAULT,
            'cost'                  =>  10
        ]
    ],
    'auth'      =>  [
        'session'                           =>  'user_id',
        'remember'                          =>  'user_r'
    ],
    'mail'      =>  [
        'smtp_auth'                         =>  true,
        'smtp_secure'                       =>  'tls',
        'host'                              =>  'smtp.gmail.com',
        'username'                          =>  'shiblie.testing@gmail.com',
        'password'                          =>  'P@ssw0rdP@ssw0rd',
        'port'                              =>  587,
        'SSLport'                           =>  565,
        'TLSSSL'                            =>  'yes',
        'html'                              =>  true
    ],
    'view'      =>  [
        'template'                          =>  __DIR__ . '/../../resources/views/',
        'cache'                             =>  __DIR__ . '/../../cache/',  // or: false
        'debug'                             =>  true,
        'auto_reload'                       =>  true,
        'cacheavail'                        =>  'public',
        'cachetime'                         =>  30,              // seconds (1 day = 86400)
        'paginationPages'                   =>  5
    ],
    'csrf'      =>  [
        'session'                           =>  'csrf_token'
    ],
    'logger'    =>  [
        'name'                              => 'authentication',
        'path'                              => __DIR__ . '/../logs/app.log',
    ]
];

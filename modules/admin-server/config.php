<?php
/**
 * admin-server config file
 * @package admin-server
 * @version 0.0.1
 * @upgrade true
 */

return [
    '__name' => 'admin-server',
    '__version' => '0.0.1',
    '__git' => 'https://github.com/getphun/admin-server',
    '__files' => [
        'modules/admin-server' => [ 'install', 'remove', 'update' ],
        'theme/admin/system/server' => [ 'install', 'remove', 'update' ]
    ],
    '__dependencies' => [
        'admin'
    ],
    '_services' => [],
    '_autoload' => [
        'classes' => [
            'AdminServer\\Controller\\ServerController' => 'modules/admin-server/controller/ServerController.php'
        ],
        'files' => []
    ],
    
    '_routes' => [
        'admin' => [
            'adminSystemServer' => [
                'rule' => '/system/server',
                'handler' => 'AdminServer\\Controller\\Server::index'
            ]
        ]
    ],
    
    'admin' => [
        'menu' => [
            'system' => [
                'label'     => 'System',
                'icon'      => 'terminal',
                'order'     => 20000,
                'submenu'   => [
                    'server'    => [
                        'label'     => 'Server',
                        'perms'     => 'read_server',
                        'target'    => 'adminSystemServer',
                        'order'     => 400
                    ]
                ]
            ]
        ]
    ]
];
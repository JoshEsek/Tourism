<?php
    /* Database settings - You can get this info from your web host. */
    $cfg['database_options']['DB_USER']        = 'root';
    $cfg['database_options']['DB_PASSWORD']    = '';
    $cfg['database_options']['DB_PORT']        = '3306';
    $cfg['database_options']['DB_NAME']        = 'tourism';
    $cfg['database_options']['DB_HOST']        = 'localhost';
    $cfg['database_options']['DB_CHARSET']     = 'utf8mb4';
    $cfg['database_options']['DB_COLLATE']     = '';
    $cfg['database_options']['DB_BASE_TABLES'] = [
            'commentmeta',
            'comments',
            'options',
            'postmeta',
            'posts',
            'usermeta',
            'users'
    ];
    $cfg['options']                            = [];

    /**
     * End of servers configuration
     */
    return $cfg;

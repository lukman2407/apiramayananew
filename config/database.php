<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'pgsql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        // Start connection to PGSL=============================================

            //DB DEFAULT 172.16.1.21 ====================================
            'pgsql' => [
                'driver' => 'pgsql',
                'host' => env('DB_HOST', '172.16.1.21'),
                'port' => env('DB_PORT', '8191'),
                'database' => env('DB_DATABASE', 'db_ris'),
                'username' => env('DB_USERNAME', 'userris'),
                'password' => env('DB_PASSWORD', 'userris@2020'),
                'charset' => 'utf8',
                'prefix' => '',
                'prefix_indexes' => true,
                'schema' => 'public',
                'sslmode' => 'prefer',
            ],

            //DB CUSTOMER 192.168.2.58
            'pgsql-192.168.2.58' => [
                'driver' => 'pgsql',
                'host' => env('DB_HOST_MEMBERCARD', '192.168.2.58'),
                'port' => env('DB_PORT_MEMBERCARD', '5432'),
                'database' => env('DB_DATABASE_MEMBERCARD', 'membercard'),
                'username' => env('DB_USERNAME_MEMBERCARD', 'user1'),
                'password' => env('DB_PASSWORD_MEMBERCARD', 'user1@123'),
                'charset' => 'utf8',
                'prefix' => '',
                'prefix_indexes' => true,
                'schema' => 'public',
                'sslmode' => 'prefer',
            ],


    //         'pgsql-172.16.1.19-reconcile' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_172_16_1_19', ''),
    //             'port' => env('DB_PORT_172_16_1_19', ''),
    //             'database' => env('DB_DATABASE_172_16_1_19', ''),
    //             'username' => env('DB_USERNAME_172_16_1_19', ''),
    //             'password' => env('DB_PASSWORD_172_16_1_19', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'reconcile',
    //             'sslmode' => 'prefer',
    //         ],


    //         'pgsql-172.16.1.16' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_172_16_1_16', ''),
    //             'port' => env('DB_PORT_172_16_1_16', ''),
    //             'database' => env('DB_DATABASE_172_16_1_16', ''),
    //             'username' => env('DB_USERNAME_172_16_1_16', ''),
    //             'password' => env('DB_PASSWORD_172_16_1_16', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'pooling',
    //             'sslmode' => 'prefer',
    //         ],


    //         'pgsql-172.16.1.5-sso' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_172_16_1_5', ''),
    //             'port' => env('DB_PORT_172_16_1_5', ''),
    //             'database' => env('DB_DATABASE_172_16_1_5', ''),
    //             'username' => env('DB_USERNAME_172_16_1_5', ''),
    //             'password' => env('DB_PASSWORD_172_16_1_5', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],
    //         //DB ALL SCHEMA 172.16.1.21 ====================================
    //         'pg-default-dev' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST', ''),
    //             'port' => env('DB_PORT', ''),
    //             'database' => env('DB_DATABASE', ''),
    //             'username' => env('DB_USERNAME', ''),
    //             'password' => env('DB_PASSWORD', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'edc_management, reconcile, pooling, public', 'digital_document',
    //             'sslmode' => 'prefer',
    //         ],


    //          //DB ALL SCHEMA 192.168.2.30 ====================================
    //          'pgsql-192.168.2.30-monitoring_activities' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_30', '192.168.2.30'),
    //             'port' => env('DB_PORT_192_168_2_30', '8191'),
    //             'database' => env('DB_DATABASE_192_168_2_30', '192.168.2.30'),
    //             'username' => env('DB_USERNAME_192_168_2_30', 'usermyactivity'),
    //             'password' => env('DB_PASSWORD_192_168_2_30', 'usermyact@123'),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'monitoring_activities',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA SHOP RALS ====================================
    //         'pg-shop-rals' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_SHOP_RALS', ''),
    //             'port' => env('DB_PORT_SHOP_RALS', ''),
    //             'database' => env('DB_DATABASE_SHOP_RALS', ''),
    //             'username' => env('DB_USERNAME_SHOP_RALS', ''),
    //             'password' => env('DB_PASSWORD_SHOP_RALS', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'shop_rals',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 192.168.2.26 ====================================
    //         'pg-192.168.2.26' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_26', '192.168.2.26'),
    //             'port' => env('DB_PORT_192_168_2_26', '8191'),
    //             'database' => env('DB_DATABASE_192_168_2_26', 'db_apiris'),
    //             'username' => env('DB_USERNAME_192_168_2_26', 'usrapiris'),
    //             'password' => env('DB_PASSWORD_192_168_2_26', 'usrap1r1s@2021'),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'reconcile',
    //             'sslmode' => 'prefer',
    //         ],

    //         'pgsql-192.168.2.26-db_arsip' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_ARSIP_192_168_2_26', ''),
    //             'port' => env('DB_PORT_ARSIP_192_168_2_26', ''),
    //             'database' => env('DB_DATABASE_ARSIP_192_168_2_26', ''),
    //             'username' => env('DB_USERNAME_ARSIP_192_168_2_26', ''),
    //             'password' => env('DB_PASSWORD_ARSIP_192_168_2_26', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         'pgsql-192.168.2.26-monitoring_activities' => [
    //             'driver' => 'pgsql',
    //             'host' => '192.168.2.26',
    //             'port' => '8191',
    //             'database' => 'db_myactivity',
    //             'username' => 'usermyactivity',
    //             'password' => 'usermyact@123#123',
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'monitoring_activities',
    //             'sslmode' => 'prefer',
    //         ],

    //         'pg-192.168.2.26-setupecommerce' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_26', ''),
    //             'port' => env('DB_PORT_192_168_2_26', ''),
    //             'database' => env('DB_DATABASE_192_168_2_26', ''),
    //             'username' => env('DB_USERNAME_192_168_2_26', ''),
    //             'password' => env('DB_PASSWORD_192_168_2_26', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 192.168.2.28 ==========172.16.1.19==========================
    //         'pg-192.168.2.28' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_28', ''),
    //             'port' => env('DB_PORT_192_168_2_28', ''),
    //             'database' => env('DB_DATABASE_192_168_2_28', ''),
    //             'username' => env('DB_USERNAME_192_168_2_28', ''),
    //             'password' => env('DB_PASSWORD_192_168_2_28', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 192.168.2.30 ====================================
    //         'pg-192.168.2.30' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_30', '192.168.2.30'),
    //             'port' => env('DB_PORT_192_168_2_30', '8191'),
    //             'database' => env('DB_DATABASE_192_168_2_30', 'db_myactivity'),
    //             'username' => env('DB_USERNAME_192_168_2_30', 'usermyactivity'),
    //             'password' => env('DB_PASSWORD_192_168_2_30', 'usermyact@123'),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         'pgsql-192.168.2.30-db_arsip' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_ARSIP_192_168_2_30', '192.168.2.30'),
    //             'port' => env('DB_PORT_ARSIP_192_168_2_30', '8191'),
    //             'database' => env('DB_DATABASE_ARSIP_192_168_2_30', 'db_arsip'),
    //             'username' => env('DB_USERNAME_ARSIP_192_168_2_30', 'usrdbarsip'),
    //             'password' => env('DB_PASSWORD_ARSIP_192_168_2_30', 'usrdb4rs1p@123'),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 172.16.1.150 ====================================
    //         'pg-172.16.1.150' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_172_16_1_150', '172.16.1.150'),
    //             'port' => env('DB_PORT_172_16_1_150', '5432'),
    //             'database' => env('DB_DATABASE_172_16_1_150', 'dbtoko'),
    //             'username' => env('DB_USERNAME_172_16_1_150', 'postgres'),
    //             'password' => env('DB_PASSWORD_172_16_1_150', 'cent123'),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 192.168.2.89 ====================================
    //         'pg-192.168.2.89' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_89', ''),
    //             'port' => env('DB_PORT_192_168_2_89', ''),
    //             'database' => env('DB_DATABASE_192_168_2_89', ''),
    //             'username' => env('DB_USERNAME_192_168_2_89', ''),
    //             'password' => env('DB_PASSWORD_192_168_2_89', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'report,telegram,telegramdev,dwh',
    //             'sslmode' => 'prefer',
    //         ],


    //          'pg-192.168.2.34' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_34', ''),
    //             'port' => env('DB_PORT_192_168_2_34', ''),
    //             'database' => env('DB_DATABASE_192_168_2_34', ''),
    //             'username' => env('DB_USERNAME_192_168_2_34', ''),
    //             'password' => env('DB_PASSWORD_192_168_2_34', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'telegram',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 172.16.1.67 ====================================
    //         'pg-172.16.1.67' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_172_16_1_67', ''),
    //             'port' => env('DB_PORT_172_16_1_67', ''),
    //             'database' => env('DB_DATABASE_172_16_1_67', ''),
    //             'username' => env('DB_USERNAME_172_16_1_67', ''),
    //             'password' => env('DB_PASSWORD_172_16_1_67', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public, ekspedisi, gold, jil, job',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 192.168.2.50 ====================================
    //         'pg-192.168.2.50' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_192_168_2_50', ''),
    //             'port' => env('DB_PORT_192_168_2_50', ''),
    //             'database' => env('DB_DATABASE_192_168_2_50', ''),
    //             'username' => env('DB_USERNAME_192_168_2_50', ''),
    //             'password' => env('DB_PASSWORD_192_168_2_50', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'tms',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA 172.16.1.204 ====================================
    //         'pg-172.16.1.204' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_172_16_1_204', ''),
    //             'port' => env('DB_PORT_172_16_1_204', ''),
    //             'database' => env('DB_DATABASE_172_16_1_204', ''),
    //             'username' => env('DB_USERNAME_172_16_1_204', ''),
    //             'password' => env('DB_PASSWORD_172_16_1_204', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'prefix_indexes' => true,
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA B2B ====================================
    //         'pg-b2b' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_B2B', '172.16.1.23'),
    //             'port' => env('DB_PORT_B2B', '5429'),
    //             'database' => env('DB_DATABASE_B2B', ''),
    //             'username' => env('DB_USERNAME_B2B', ''),
    //             'password' => env('DB_PASSWORD_B2B', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'schema' => 'public',
    //             'sslmode' => 'prefer',
    //         ],

    //         //DB ALL SCHEMA Online API ====================================
    //         'pg-onlineapi' => [
    //             'driver' => 'pgsql',
    //             'host' => env('DB_HOST_ONLINEAPI', '192.168.2.30'),
    //             'port' => env('DB_PORT_ONLINEAPI', '8191'),
    //             'database' => env('DB_DATABASE_ONLINEAPI', ''),
    //             'username' => env('DB_USERNAME_ONLINEAPI', ''),
    //             'password' => env('DB_PASSWORD_ONLINEAPI', ''),
    //             'charset' => 'utf8',
    //             'prefix' => '',
    //             'schema' => 'public',
    //         ],

    //     // Start connection to ORACLE===============================================
    //       //DB 172.16.1.132 (GOLD PROD) ====================================
    //        'orcl-172.16.1.132' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_GOLD_PROD', ''),
    //           'host'          => env('DB_HOST_GOLD_PROD', ''),
    //           'port'          => env('DB_PORT_GOLD_PROD', ''),
    //           'database'      => env('DB_DATABASE_GOLD_PROD', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_GOLD_PROD', ''),
    //           'username'      => env('DB_USERNAME_GOLD_PROD', ''),
    //           'password'      => env('DB_PASSWORD_GOLD_PROD', ''),
    //           'charset'       => env('DB_CHARSET_GOLD_PROD', ''),
    //           'prefix'        => env('DB_PREFIX_GOLD_PROD', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_GOLD_PROD', ''),
    //       ],

    //       //DB 172.16.1.120 (GOLD UAT) ==================================== di pindahin sama pak santo ke 117
    //        'orcl-172.16.1.120' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_GOLD_UAT', ''),
    //           'host'          => env('DB_HOST_GOLD_UAT', ''),
    //           'port'          => env('DB_PORT_GOLD_UAT', ''),
    //           'database'      => env('DB_DATABASE_GOLD_UAT', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_GOLD_UAT', ''),
    //           'username'      => env('DB_USERNAME_GOLD_UAT', ''),
    //           'password'      => env('DB_PASSWORD_GOLD_UAT', ''),
    //           'charset'       => env('DB_CHARSET_GOLD_UAT', ''),
    //           'prefix'        => env('DB_PREFIX_GOLD_UAT', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_GOLD_UAT', ''),
    //       ],

    //       //DB 172.21.4.242 (GOLD STOCK DRY PROD) ====================================
    //        'orcl-172.21.4.242-dry' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_GOLD_STOCK_DRY_PROD', ''),
    //           'host'          => env('DB_HOST_GOLD_STOCK_DRY_PROD', ''),
    //           'port'          => env('DB_PORT_GOLD_STOCK_DRY_PROD', ''),
    //           'database'      => env('DB_DATABASE_GOLD_STOCK_DRY_PROD', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_GOLD_STOCK_DRY_PROD', ''),
    //           'username'      => env('DB_USERNAME_GOLD_STOCK_DRY_PROD', ''),
    //           'password'      => env('DB_PASSWORD_GOLD_STOCK_DRY_PROD', ''),
    //           'charset'       => env('DB_CHARSET_GOLD_STOCK_DRY_PROD', ''),
    //           'prefix'        => env('DB_PREFIX_GOLD_STOCK_DRY_PROD', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_GOLD_STOCK_DRY_PROD', ''),
    //       ],

    //       //DB 172.21.4.242 (GOLD STOCK FRE PROD) ====================================
    //        'orcl-172.21.4.242-fre' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_GOLD_STOCK_FRE_PROD', ''),
    //           'host'          => env('DB_HOST_GOLD_STOCK_FRE_PROD', ''),
    //           'port'          => env('DB_PORT_GOLD_STOCK_FRE_PROD', ''),
    //           'database'      => env('DB_DATABASE_GOLD_STOCK_FRE_PROD', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_GOLD_STOCK_FRE_PROD', ''),
    //           'username'      => env('DB_USERNAME_GOLD_STOCK_FRE_PROD', ''),
    //           'password'      => env('DB_PASSWORD_GOLD_STOCK_FRE_PROD', ''),
    //           'charset'       => env('DB_CHARSET_GOLD_STOCK_FRE_PROD', ''),
    //           'prefix'        => env('DB_PREFIX_GOLD_STOCK_FRE_PROD', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_GOLD_STOCK_FRE_PROD', ''),
    //       ],

    //       //DB 172.16.1.8 (ORAFIN PROD) ====================================
    //       'orcl-172.16.1.8' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_ORAFIN_PROD', ''),
    //           'host'          => env('DB_HOST_ORAFIN_PROD', ''),
    //           'port'          => env('DB_PORT_ORAFIN_PROD', ''),
    //           'database'      => env('DB_DATABASE_ORAFIN_PROD', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_ORAFIN_PROD', ''),
    //           'username'      => env('DB_USERNAME_ORAFIN_PROD', ''),
    //           'password'      => env('DB_PASSWORD_ORAFIN_PROD', ''),
    //           'charset'       => env('DB_CHARSET_ORAFIN_PROD', ''),
    //           'prefix'        => env('DB_PREFIX_ORAFIN_PROD', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_ORAFIN_PROD', ''),
    //       ],

    //       //DB 172.16.1.213 (ORAFIN UAT) ====================================
    //       'orcl-172.16.1.213' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_ORAFIN_UAT', ''),
    //           'host'          => env('DB_HOST_ORAFIN_UAT', ''),
    //           'port'          => env('DB_PORT_ORAFIN_UAT', ''),
    //           'database'      => env('DB_DATABASE_ORAFIN_UAT', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_ORAFIN_UAT', ''),
    //           'username'      => env('DB_USERNAME_ORAFIN_UAT', ''),
    //           'password'      => env('DB_PASSWORD_ORAFIN_UAT', ''),
    //           'charset'       => env('DB_CHARSET_ORAFIN_UAT', ''),
    //           'prefix'        => env('DB_PREFIX_ORAFIN_UAT', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_ORAFIN_UAT', ''),
    //       ],


    //       //DB 172.16.1.213 (ORAFIN UAT) ====================================
    //       'orcl-172.16.1.213-dev' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_ORAFINE_DEV', ''),
    //           'host'          => env('DB_HOST_ORAFINE_DEV', ''),
    //           'port'          => env('DB_PORT_ORAFINE_DEV', ''),
    //           'database'      => env('DB_DATABASE_ORAFINE_DEV', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_ORAFINE_DEV', ''),
    //           'username'      => env('DB_USERNAME_ORAFINE_DEV', ''),
    //           'password'      => env('DB_PASSWORD_ORAFINE_DEV', ''),
    //           'charset'       => env('DB_CHARSET_ORAFINE_DEV', ''),
    //           'prefix'        => env('DB_PREFIX_ORAFINE_DEV', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_ORAFINE_DEV', ''),
    //       ],


    //       //DB 172.16.1.213 (ORAFIN UAT) ====================================
    //       'ORAFIN' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_ORAFINE_DEV', ''),
    //           'host'          => env('DB_HOST_ORAFINE_DEV', ''),
    //           'port'          => env('DB_PORT_ORAFINE_DEV', ''),
    //           'database'      => env('DB_DATABASE_ORAFINE_DEV', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_ORAFINE_DEV', ''),
    //           'username'      => env('DB_USERNAME_ORAFINE_DEV', ''),
    //           'password'      => env('DB_PASSWORD_ORAFINE_DEV', ''),
    //           'charset'       => env('DB_CHARSET_ORAFINE_DEV', ''),
    //           'prefix'        => env('DB_PREFIX_ORAFINE_DEV', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_ORAFINE_DEV', ''),
    //       ],


    //       'ORAFIN_FASH' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_ORAFINE_DEV', ''),
    //           'host'          => env('DB_HOST_ORAFINE_DEV', ''),
    //           'port'          => env('DB_PORT_ORAFINE_DEV', ''),
    //           'database'      => env('DB_DATABASE_ORAFINE_DEV', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_ORAFINE_DEV', ''),
    //           'username'      => env('DB_USERNAME_ORAFINE_DEV', ''),
    //           'password'      => env('DB_PASSWORD_ORAFINE_DEV', ''),
    //           'charset'       => env('DB_CHARSET_ORAFINE_DEV', ''),
    //           'prefix'        => env('DB_PREFIX_ORAFINE_DEV', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_ORAFINE_DEV', ''),
    //       ],


    //       //DB 172.16.1.213 (ORAFIN UAT) ====================================
    //       'orcl-172.16.1.234' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_MARIS_PROD', ''),
    //           'host'          => env('DB_HOST_MARIS_PROD', ''),
    //           'port'          => env('DB_PORT_MARIS_PROD', ''),
    //           'database'      => env('DB_DATABASE_MARIS_PROD', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_MARIS_PROD', ''),
    //           'username'      => env('DB_USERNAME_MARIS_PROD', ''),
    //           'password'      => env('DB_PASSWORD_MARIS_PROD', ''),
    //           'charset'       => env('DB_CHARSET_MARIS_PROD', ''),
    //           'prefix'        => env('DB_PREFIX_MARIS_PROD', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_MARIS_PROD', ''),
    //       ],

    //       'orcl-172.16.126.241' => [
    //           'driver'        => 'oracle',
    //           'tns'           => env('DB_TNS_MARIS_DEV_TEST', ''),
    //           'host'          => env('DB_HOST_MARIS_DEV_TEST', ''),
    //           'port'          => env('DB_PORT_MARIS_DEV_TEST', ''),
    //           'database'      => env('DB_DATABASE_MARIS_DEV_TEST', ''),
    //           'service_name'  => env('DB_SERVICE_NAME_MARIS_DEV_TEST', ''),
    //           'username'      => env('DB_USERNAME_MARIS_DEV_TEST', ''),
    //           'password'      => env('DB_PASSWORD_MARIS_DEV_TEST', ''),
    //           'charset'       => env('DB_CHARSET_MARIS_DEV_TEST', ''),
    //           'prefix'        => env('DB_PREFIX_MARIS_DEV_TEST', ''),
    //           'prefix_schema' => env('DB_SCHEMA_PREFIX_MARIS_DEV_TEST', ''),
    //       ],

    //       'fash-172.16.1.234' => [
    //         'driver'        => 'oracle',
    //         'tns'           => env('DB_TNS_FASH', ''),
    //         'host'          => env('DB_HOST_FASH', ''),
    //         'port'          => env('DB_PORT_FASH', ''),
    //         'database'      => env('DB_DATABASE_FASH', ''),
    //         'service_name'  => env('DB_SERVICE_FASH', ''),
    //         'username'      => env('DB_USERNAME_FASH', ''),
    //         'password'      => env('DB_PASSWORD_FASH', ''),
    //         'charset'       => env('DB_CHARSET_FASH', ''),
    //         'prefix'        => env('DB_PREFIX_FASH', ''),
    //         'prefix_schema' => env('DB_SCHEMA_PREFIX_FASH', ''),
    //       ],

    //       'bazz-172.16.1.234' => [
    //         'driver'        => 'oracle',
    //         'tns'           => env('DB_TNS_BAZZ', ''),
    //         'host'          => env('DB_HOST_BAZZ', ''),
    //         'port'          => env('DB_PORT_BAZZ', ''),
    //         'database'      => env('DB_DATABASE_BAZZ', ''),
    //         'service_name'  => env('DB_SERVICE_BAZZ', ''),
    //         'username'      => env('DB_USERNAME_BAZZ', ''),
    //         'password'      => env('DB_PASSWORD_BAZZ', ''),
    //         'charset'       => env('DB_CHARSET_BAZZ', ''),
    //         'prefix'        => env('DB_PREFIX_BAZZ', ''),
    //         'prefix_schema' => env('DB_SCHEMA_PREFIX_BAZZ', ''),
    //       ],

    //       'srv-172.16.1.187-train' => [
    //           'driver' => 'sqlsrv',
    //           'url' => env('DATABASE_URL',''),
    //           'host' => env('DB_HOST_172_16_1_187_TRAIN', ''),
    //           'port' => env('DB_PORT_172_16_1_187_TRAIN', ''),
    //           'database' => env('DB_DATABASE_172_16_1_187_TRAIN', ''),
    //           'username' => env('DB_USERNAME_172_16_1_187_TRAIN', ''),
    //           'password' => env('DB_PASSWORD_172_16_1_187_TRAIN', ''),
    //           'charset' => 'utf8',
    //           'prefix' => '',
    //           'prefix_indexes' => true,
    //       ],

    //       'srv-172.16.1.187-mkt' => [
    //           'driver' => 'sqlsrv',
    //           'url' => env('DATABASE_URL',''),
    //           'host' => env('DB_HOST_172_16_1_187_MKT', ''),
    //           'port' => env('DB_PORT_172_16_1_187_MKT', ''),
    //           'database' => env('DB_DATABASE_172_16_1_187_MKT', ''),
    //           'username' => env('DB_USERNAME_172_16_1_187_MKT', ''),
    //           'password' => env('DB_PASSWORD_172_16_1_187_MKT', ''),
    //           'charset' => 'utf8',
    //           'prefix' => '',
    //           'prefix_indexes' => true,
    //       ],


    //       'srv-172.16.1.55-orange' => [
    //         'driver' => 'pgsql',
    //         'url' => env('DATABASE_URL',''),
    //         'host' => env('DB_HOST_172.16.1.55', ''),
    //         'port' => env('DB_PORT_172.16.1.55', ''),
    //         'database' => env('DB_DATABASE_172.16.1.55', ''),
    //         'username' => env('DB_USERNAME_172.16.1.55', ''),
    //         'password' => env('DB_PASSWORD_172.16.1.55', ''),
    //         'charset' => 'utf8',
    //         'prefix' => '',
    //         'prefix_indexes' => true,
    //         'schema' => 'public',
    //         'sslmode' => 'prefer',
    //     ],


    //     'srv-orange' => [
    //       'driver' => 'pgsql',
    //       'url' => env('DATABASE_URL',''),
    //       'host' => env('DB_HOST_172.16.1.55', ''),
    //       'port' => env('DB_PORT_172.16.1.55', ''),
    //       'database' => env('DB_DATABASE_172.16.1.55', ''),
    //       'username' => env('DB_USERNAME_172.16.1.55', ''),
    //       'password' => env('DB_PASSWORD_172.16.1.55', ''),
    //       'charset' => 'utf8',
    //       'prefix' => '',
    //       'prefix_indexes' => true,
    //       'schema' => 'public',
    //       'sslmode' => 'prefer',
    //   ],


    //     'oracle' => [
    //         'driver' => 'oracle',
    //         'host' => 'oracle.host',
    //         'port' => '1521',
    //         'database' => 'xe',
    //         'service_name' => 'sid_alias',
    //         'username' => 'hr',
    //         'password' => 'hr',
    //         'charset' => '',
    //         'prefix' => '',
    //     ],


    //     //DB ALL SCHEMA 192.168.2.89 ====================================
    //     'dbprod' => [
    //         'driver' => 'pgsql',
    //         'host' => env('DB_HOST', '172.16.1.21'),
    //         'port' => env('DB_PORT', '8191'),
    //         'database' => env('DB_DATABASE', 'db_ris'),
    //         'username' => env('DB_USERNAME', 'userris'),
    //         'password' => env('DB_PASSWORD', 'userris@2020'),
    //         'charset' => 'utf8',
    //         'prefix' => '',
    //         'prefix_indexes' => true,
    //         'schema' => 'public',
    //         'sslmode' => 'prefer',
    //     ],

        

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        // 'client' => env('REDIS_CLIENT', 'phpredis'),
        'client' => 'predis',

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', 'test@123'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', 'test@123'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
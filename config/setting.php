<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable / Disable auto save
    |--------------------------------------------------------------------------
    |
    | Auto-save every time the application shuts down
    |
    */
    'auto_save'         => true,

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Options for caching. Set whether to enable cache, its key, time to live
    | in seconds and whether to auto clear after save.
    |
    */
    'cache' => [
        'enabled'       => false,
        'key'           => 'setting',
        'ttl'           => 3600,
        'auto_clear'    => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Setting driver
    |--------------------------------------------------------------------------
    |
    | Select where to store the settings.
    |
    | Supported: "database", "json", "memory"
    |
    */
    'driver'            => 'database',

    /*
    |--------------------------------------------------------------------------
    | Database driver
    |--------------------------------------------------------------------------
    |
    | Options for database driver. Enter which connection to use, null means
    | the default connection. Set the table and column names.
    |
    */
    'database' => [
        'connection'    => 'mysql',
        'table'         => 'settings',
        'key'           => 'key',
        'value'         => 'value',
    ],

    /*
    |--------------------------------------------------------------------------
    | JSON driver
    |--------------------------------------------------------------------------
    |
    | Options for json driver. Enter the full path to the .json file.
    |
    */
    'json' => [
        'path'          => storage_path() . '/settings.json',
    ],

    /*
    |--------------------------------------------------------------------------
    | Override application config values
    |--------------------------------------------------------------------------
    |
    | If defined, settings package will override these config values.
    |
    | Sample:
    |   "app.locale" => "settings.locale",
    |
    */
    'override' => [
        'mail.default' => 'mail_mailer',
        'mail.mailers.smtp.host' => 'mail_host',
        'mail.mailers.smtp.port' => 'mail_port',
        'mail.mailers.smtp.username' => 'mail_username',
        'mail.mailers.smtp.password' => 'mail_password',
        'mail.mailers.smtp.encryption' => 'mail_encryption',
        'mail.from.name' => 'mail_from_name',
        'mail.from.address' => 'mail_from_address',

        'services.mailgun.domain' => 'mailgun_domain',
        'services.mailgun.secret' => 'mailgun_secret',
        'services.mailgun.endpoint' => 'mailgun_endpoint',

        'site.converted_file_driver' => 'converted_file_driver',
        'site.hls_segment_size' => 'hls_segment_size',
        'site.frame_from_seconds' => 'frame_from_seconds',

        'filesystems.disks.s3.key' => 'aws_access_key_id',
        'filesystems.disks.s3.secret' => 'aws_secret_access_key',
        'filesystems.disks.s3.region' => 'aws_default_region',
        'filesystems.disks.s3.bucket' => 'aws_bucket',
        'filesystems.disks.s3.url' => 'aws_url',
        'filesystems.disks.s3.endpoint' => 'aws_endpoint',
    ],

    /*
    |--------------------------------------------------------------------------
    | Fallback
    |--------------------------------------------------------------------------
    |
    | Define fallback settings to be used in case the default is null
    |
    | Sample:
    |   "currency" => "USD",
    |
    */
    'fallback' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Required Extra Columns
    |--------------------------------------------------------------------------
    |
    | The list of columns required to be set up
    |
    | Sample:
    |   "user_id",
    |   "tenant_id",
    |
    */
    'required_extra_columns' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Encryption
    |--------------------------------------------------------------------------
    |
    | Define the keys which should be crypt automatically.
    |
    | Sample:
    |   "payment.key"
    |
    */
   'encrypted_keys' => [

   ],

];

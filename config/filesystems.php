<?php

use League\Flysystem\GoogleCloudStorage\UniformBucketLevelAccessVisibility;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'gcs' => [
            'driver' => 'gcs',
            // 'url' => 'https://storage.googleapis.com/web_opd',
            'key_file' => [
                "type" => "service_account",
                "project_id" => "diskominfo-wonosobo",
                "private_key_id" => "d4b3ffdef02a35ffcb3c336cf18825e826385488",
                "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC2MzPHUqnPDCco\nCf4FxLJ/h/YpQcfHjVDYDpxHLio3OYGZks87KAqOCIWC7bS31ID6ahnE0BtMaJ1C\ng5WY5UoZnpDUiTSKC8BTxOqgb75pc+A9gkHLsynsRTZpDQ6YrE5zxtbJQbyQq0vv\n16pEjEcfFXmEnJMfVx8c6lpi6g9upyZglKeZEFjKZeE7nshOVv0WttHzw0ScKwrH\nJyyku07aUQOabzQZmE9trzoIMxlvOQi19qpDAElGpMpxbLUj+RvvkFrXshOwjrbC\n2DWbji/xOHhb1N4/Uwi0f+vxTjTBBCTKduMr6Mnw9in7NGDjvlkJcdWa8XDIGLwZ\njsgHSzr5AgMBAAECggEAARAUe3NhXh3HvYbCZTRNUhZf/UQJl0HH0LzUFKEMWhOz\nLHXJZkKmE3JGshmddLblVOCee3IMfgzRrFrHZNO4k7nuWxkHoLhaaWVZijD2Axg2\nkjFIHY5d3nJAaSA2/1++ROlfj8oQVdEz/BINskDrD3S7p4ZWIDLiRvPx2J1y1INx\nUtE76s5yx19hkUGO+YDqn9zSBjB2nQXtjEwmkJhpeZ0oYX7Uag7zizhEFJIZPOL+\nbcWRko7XQ5ZHvbPRtwb2yFj9xZhUwwMoGmMJXCoIYbTe2oM6aj4ieVjcmUnXgbNm\nQdgk9Pv5nMZJqdMg+NxQu68wQ7M3UsV3IFO6F5DbMQKBgQDifRNMmIIinqCS+ogf\nv5XaFHFFrFgyOGiRragIjuPD07bLzQ+DC/6EO6pB2+WRR/THuvxeTNEt84anDMMy\nb34KChyEBJQad5C9Y+6+Naj96LAbtuToI93Sdz4fpIPKwuBAafkkIbUepA61OOZB\nJqP5hdT1grk3OAYxJqMtbEJjiQKBgQDN8M3KBk9DfQ2yDRtNlXCqZbkcG1dzDQpw\nsJBkkb3wEbPAcml9Zdxa4yDr5N2iR4iR1GQfEP/87pXebmpXFefuVf4nEYxkv/PT\nAR+1tUOrIoIEDN997OJbx5CvYHIL4QSH1JnkkMMwB7DIMbByZCeQUJOslB37PQKt\n6NWdlyKP8QKBgQCpLtsKvWWAbNPv1tt2M8vBcsHGVN4w7XgXUgwSEILNFkoW5N/w\neTYvGs6skZFju8d6pw+7dVBQLfhospzhAO26nCD+8NidCLGC97IwPa81s+pRWYaW\nbaxWeiJayq5z+KxBEag8uD0uXUhrUMyW4EFes/0HRBYMzHm7n2wHEzZoWQKBgEab\nCaL6+M/1nu1tiu/VjXQOPiHBygCa9vpdvpOMWCdnmk4fq8UfWCYc+tuFcutBRTRi\nMhVomatZDS7egjzrOMJA30r7vDuKiAjOuNVumQ2iXhsPYsxkm9LFn/hQw6kI86my\nHTT84L6l1Fk+l/UQG3Rh+89OVN0fNLz1N8+40lOxAoGAa1uqw8WvYu+aEW8fVMQQ\n5SVUs7baM+ukOnvRXt7025WpTTT9t8yizlSU3cCqs0Ys9sebYHxbv8FHYAUnA8W4\nx+H5lUR4EAfGszlKmrlrCa/et4GrT/3IhHzuj7UdpYQkCTOAMRI0b2UJViN79/NF\nHAIEmpcbtd7SiqpkzkOQNDw=\n-----END PRIVATE KEY-----\n",
                "client_email" => "isa-389@diskominfo-wonosobo.iam.gserviceaccount.com",
                "client_id" => "109661616418836414203",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/isa-389%40diskominfo-wonosobo.iam.gserviceaccount.com",
                "universe_domain" => "googleapis.com",
            ], // optional: Array of data that substitutes the .json file (see below)
            'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', 'web_opd'),
            // 'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', 'gcs'), // optional: /default/path/to/apply/in/bucket
            'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI', null), // see: Public URLs below
            'apiEndpoint' => env('GOOGLE_CLOUD_STORAGE_API_ENDPOINT', null), // set storageClient apiEndpoint
            'visibility' => 'noPredefinedVisibility', // optional: public|private
            'visibility_handler' => UniformBucketLevelAccessVisibility::class, // optional: set to \League\Flysystem\GoogleCloudStorage\UniformBucketLevelAccessVisibility::class to enable uniform bucket level access
            // 'metadata' => ['cacheControl' => 'public,max-age=86400'], // optional: default metadata
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

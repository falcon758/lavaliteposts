# Installation

The instructions below will help you to properly install the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/channels/postbuffer/`

## Composer

Add the below entries in the `composer.json` file's autoload section and run the command `composer dump-autoload` in terminal.

```json

...
     "autoload": {
         ...

        "classmap": [
            ...
            
            "packages/channels/postbuffer/database/seeds",
            
            ...
        ],
        "psr-4": {
            ...
            
            "Channels\\Postbuffer\\": "packages/channels/postbuffer/src",
            
            ...
        }
    },
...

```

## Config

Add the entries in service provider in `config/app.php`

```php

...
    'providers'       => [
        ...
        
        Channels\Postbuffer\Providers\PostbufferServiceProvider::class,
        
        ...
    ],

    ...

    'alias'             => [
        ...
        
        'Postbuffer'  => Channels\Postbuffer\Facades\Postbuffer::class,
        
        ...
    ]
...

```

## Migrate

After service provider is set run the commapnd to migrate and seed the database.


    php artisan migrate
    php artisan db:seed --class=Channels\\PostbufferTableSeeder

## Publishing


**Publishing configuration**

    php artisan vendor:publish --provider="Channels\Postbuffer\Providers\PostbufferServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Channels\Postbuffer\Providers\PostbufferServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Channels\Postbuffer\Providers\PostbufferServiceProvider" --tag="view"


## URLs and APIs


### Web Urls

**Admin**

    http://path-to-route-folder/admin/postbuffer/{modulename}

**User**

    http://path-to-route-folder/user/postbuffer/{modulename}

**Public**

    http://path-to-route-folder/postbuffers


### API endpoints

**List**

    http://path-to-route-folder/api/user/postbuffer/{modulename}
    METHOD: GET

**Create**

    http://path-to-route-folder/api/user/postbuffer/{modulename}
    METHOD: POST

**Edit**

    http://path-to-route-folder/api/user/postbuffer/{modulename}/{id}
    METHOD: PUT

**Delete**

    http://path-to-route-folder/api/user/postbuffer/{modulename}/{id}
    METHOD: DELETE

**Public List**

    http://path-to-route-folder/api/postbuffer/{modulename}
    METHOD: GET

**Public Single**

    http://path-to-route-folder/api/postbuffer/{modulename}/{slug}
    METHOD: GET
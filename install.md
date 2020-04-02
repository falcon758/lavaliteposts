# Installation

The instructions below will help you to properly install the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/postbuffer/channels/`

## Composer

Add the below entries in the `composer.json` file's autoload section and run the command `composer dump-autoload` in terminal.

```json

...
     "autoload": {
         ...

        "classmap": [
            ...
            
            "packages/postbuffer/channels/database/seeds",
            
            ...
        ],
        "psr-4": {
            ...
            
            "Postbuffer\\Channels\\": "packages/postbuffer/channels/src",
            
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
        
        Postbuffer\Channels\Providers\ChannelsServiceProvider::class,
        
        ...
    ],

    ...

    'alias'             => [
        ...
        
        'Channels'  => Postbuffer\Channels\Facades\Channels::class,
        
        ...
    ]
...

```

## Migrate

After service provider is set run the commapnd to migrate and seed the database.


    php artisan migrate
    php artisan db:seed --class=Postbuffer\\ChannelsTableSeeder

## Publishing


**Publishing configuration**

    php artisan vendor:publish --provider="Postbuffer\Channels\Providers\ChannelsServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Postbuffer\Channels\Providers\ChannelsServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Postbuffer\Channels\Providers\ChannelsServiceProvider" --tag="view"


## URLs and APIs


### Web Urls

**Admin**

    http://path-to-route-folder/admin/channels/{modulename}

**User**

    http://path-to-route-folder/user/channels/{modulename}

**Public**

    http://path-to-route-folder/channels


### API endpoints

**List**

    http://path-to-route-folder/api/user/channels/{modulename}
    METHOD: GET

**Create**

    http://path-to-route-folder/api/user/channels/{modulename}
    METHOD: POST

**Edit**

    http://path-to-route-folder/api/user/channels/{modulename}/{id}
    METHOD: PUT

**Delete**

    http://path-to-route-folder/api/user/channels/{modulename}/{id}
    METHOD: DELETE

**Public List**

    http://path-to-route-folder/api/channels/{modulename}
    METHOD: GET

**Public Single**

    http://path-to-route-folder/api/channels/{modulename}/{slug}
    METHOD: GET
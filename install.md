# Installation

The instructions below will help you to properly install the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/posts/posts/`

## Composer

Add the below entries in the `composer.json` file's autoload section and run the command `composer dump-autoload` in terminal.

```json

...
     "autoload": {
         ...

        "classmap": [
            ...
            
            "packages/posts/posts/database/seeds",
            
            ...
        ],
        "psr-4": {
            ...
            
            "Posts\\Posts\\": "packages/posts/posts/src",
            
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
        
        Posts\Posts\Providers\PostsServiceProvider::class,
        
        ...
    ],

    ...

    'alias'             => [
        ...
        
        'Posts'  => Posts\Posts\Facades\Posts::class,
        
        ...
    ]
...

```

## Migrate

After service provider is set run the commapnd to migrate and seed the database.


    php artisan migrate
    php artisan db:seed --class=Posts\\PostsTableSeeder

## Publishing


**Publishing configuration**

    php artisan vendor:publish --provider="Posts\Posts\Providers\PostsServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Posts\Posts\Providers\PostsServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Posts\Posts\Providers\PostsServiceProvider" --tag="view"


## URLs and APIs


### Web Urls

**Admin**

    http://path-to-route-folder/admin/posts/{modulename}

**User**

    http://path-to-route-folder/user/posts/{modulename}

**Public**

    http://path-to-route-folder/posts


### API endpoints

**List**

    http://path-to-route-folder/api/user/posts/{modulename}
    METHOD: GET

**Create**

    http://path-to-route-folder/api/user/posts/{modulename}
    METHOD: POST

**Edit**

    http://path-to-route-folder/api/user/posts/{modulename}/{id}
    METHOD: PUT

**Delete**

    http://path-to-route-folder/api/user/posts/{modulename}/{id}
    METHOD: DELETE

**Public List**

    http://path-to-route-folder/api/posts/{modulename}
    METHOD: GET

**Public Single**

    http://path-to-route-folder/api/posts/{modulename}/{slug}
    METHOD: GET
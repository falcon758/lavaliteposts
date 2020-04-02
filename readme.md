Lavalite package that provides posts management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `posts/posts`.

    "posts/posts": "*"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Posts\Posts\Providers\PostsServiceProvider::class,

And also add it to alias

    'Posts'  => Posts\Posts\Facades\Posts::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Posts\\PostsTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Posts\Posts\Providers\PostsServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Posts\Posts\Providers\PostsServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Posts\Posts\Providers\PostsServiceProvider" --tag="view"


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

Lavalite package that provides posts management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `postbuffer/posts`.

    "falcon758/lavaliteposts": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Postbuffer\Posts\Providers\PostsServiceProvider::class,

And also add it to alias

    'Posts'  => Postbuffer\Posts\Facades\Posts::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Postbuffer\\PostsTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Postbuffer\Posts\Providers\PostsServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Postbuffer\Posts\Providers\PostsServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Postbuffer\Posts\Providers\PostsServiceProvider" --tag="view"


## Usage



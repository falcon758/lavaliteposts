Lavalite package that provides postbuffer management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `channels/postbuffer`.

    "falcon758/lavaliteposts": "*"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Channels\Postbuffer\Providers\PostbufferServiceProvider::class,

And also add it to alias

    'Postbuffer'  => Channels\Postbuffer\Facades\Postbuffer::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Channels\\PostbufferTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Channels\Postbuffer\Providers\PostbufferServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Channels\Postbuffer\Providers\PostbufferServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Channels\Postbuffer\Providers\PostbufferServiceProvider" --tag="view"


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

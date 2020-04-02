Lavalite package that provides channels management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `postbuffer/channels`.

    "falcon758/lavaliteposts": "*"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Postbuffer\Channels\Providers\ChannelsServiceProvider::class,

And also add it to alias

    'Channels'  => Postbuffer\Channels\Facades\Channels::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Postbuffer\\ChannelsTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Postbuffer\Channels\Providers\ChannelsServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Postbuffer\Channels\Providers\ChannelsServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Postbuffer\Channels\Providers\ChannelsServiceProvider" --tag="view"


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

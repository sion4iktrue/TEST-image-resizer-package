local install:

    add to (project root) "composer.json":

    "repositories": [ { "type": "path", "url": "path/to/package" //ex. - "packages/smarty" } ]

    add to "config/app.php":

    'providers' => [ ... Smarty\ImageResizer\ImageResizerServiceProvider::class, ... ];

    terminal - "composer require smarty/imageresizer:dev-master --prefer-source"


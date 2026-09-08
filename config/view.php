<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | Blade compiles templates before they are rendered. Keep the compiled
    | templates in Laravel's writable framework storage directory so the path
    | is available in production containers as well as local environments.
    |
    */

    'compiled' => env('VIEW_COMPILED_PATH', storage_path('framework/views')),

];

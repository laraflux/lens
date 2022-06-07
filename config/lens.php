<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Observers
    |--------------------------------------------------------------------------
    |
    | This option defines which model events we are observing.
    |
    */

    'observe' => [
        'creating' => false,
        'created' => true,
        'updating' => false,
        'updated' => true,
        'saving' => false,
        'saved' => false,
        'deleting' => false,
        'deleted' => true,
        'trashed' => false,
        'forceDeleted' => false,
        'restoring' => false,
        'restored' => false,
        'replicating' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Purge limits
    |--------------------------------------------------------------------------
    |
    | Does not purge automatically by default (scheduler must also be running).
    | The older_than limit is set in days.
    | Set to 0 to disable limits.
    |
    | Commands for the scheduler are:
    | $schedule->command('lens:purge-more-than')->hourly();
    | $schedule->command('lens:purge-older-than')->daily();
    | You only need to set these manually if auto = false.
    |
    */

    'purge' => [
        'auto' => env('LENS_PURGE_AUTOMATICALLY', false),
        'more_than' => env('LENS_PURGE_MORE_THAN', 1000),
        'older_than' => env('LENS_PURGE_OLDER_THAN', 365),
    ]
];

<?php

return [

    /**
     * Which actions are we observing by default.
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

    /**
     * The field used in the log to identify a user.
     */
    'user' => [
        'identifier' => 'name',
    ],

    /**
     * Automatic purge limits.
     * older_than set in days.
     * set to 0 to disable limit.
     */
    'purge' => [
        'auto' => env('LENS_PURGE_AUTOMATICALLY', true),
        'more_than' => env('LENS_PURGE_MORE_THAN', 100),
        'older_than' => env('LENS_PURGE_OLDER_THAN', 365),
    ]
];

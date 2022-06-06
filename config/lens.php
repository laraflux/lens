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

];

<?php

return [

    'live' => [
        'type' => 'pulls',
        'url' => env('GITHUB_API_URL'),
        'owner' => env('GITHUB_API_OWNER'),
        'repository' => env('GITHUB_API_REPOSITORY'),
        'token' => env('GITHUB_API_PERSONAL_TOKEN'),
        'params' => [
            'state=closed',
            'per_page=10'
        ]
    ],

];

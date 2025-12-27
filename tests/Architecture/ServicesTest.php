<?php

arch('parsable content services')
    ->expect('App\Services\ParsableContentProviders')
    ->toImplement('App\Contracts\Services\ParsableContentProvider')
    ->toOnlyBeUsedIn([
        'App\Services',
    ]);

<?php

arch('exceptions')
    ->expect('App\Exceptions')
    ->toImplement('Throwable')
    ->toOnlyBeUsedIn([
        'App\Console\Commands',
        'App\Http\Controllers',
        'App\Livewire',
        'App\Services',
    ]);

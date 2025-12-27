<?php

arch('controllers')
    ->expect('App\Http\Controllers')
    ->toExtendNothing()
    ->not->toBeUsed();

arch('middleware')
    ->skip()
    ->expect('App\Http\Middleware')
    ->toHaveMethod('handle')
    ->toUse('Illuminate\Http\Request')
    ->not->toBeUsed();

arch('requests')
    ->skip()
    ->expect('App\Http\Requests')
    ->toExtend('Illuminate\Foundation\Http\FormRequest')
    ->toHaveMethod('rules')
    ->toBeUsedIn('App\Http\Controllers');

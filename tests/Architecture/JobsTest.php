<?php

arch('jobs')
    ->expect('App\Jobs')
    ->toHaveMethod('handle')
    ->toHaveConstructor()
    ->toExtendNothing()
    ->toImplement('Illuminate\Contracts\Queue\ShouldQueue');

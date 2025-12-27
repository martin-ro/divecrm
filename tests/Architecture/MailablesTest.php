<?php

arch('mailables')
    ->expect('App\Mail')
    ->toHaveConstructor()
    ->toExtend('Illuminate\Mail\Mailable');

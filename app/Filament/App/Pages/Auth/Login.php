<?php

namespace App\Filament\App\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Override;

class Login extends BaseLogin
{
    #[Override]
    public function mount(): void
    {
        parent::mount();

        if (app()->isLocal()) {
            $this->form->fill([
                'email' => config('app.default_user.email'),
                'password' => config('app.default_user.password'),
                'remember' => true,
            ]);
        }
    }
}

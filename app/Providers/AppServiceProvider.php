<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Sleep;
use Illuminate\Validation\Rules\Password;
use Override;

class AppServiceProvider extends ServiceProvider
{
    #[Override]
    public function register(): void
    {
        $this->registerFilamentColors();
    }

    public function boot(): void
    {
        $this->configureDestructiveCommands();
        $this->configurePasswords();
        $this->configureVite();
        $this->configureModels();
        $this->configureSleep();
        $this->configureHttp();
        $this->configureDate();
    }

    public function configureDestructiveCommands(): void
    {
        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );
    }

    private function configurePasswords(): void
    {
        Password::defaults(fn () => app()->isProduction()
            ? Password::min(8)->max(255)->uncompromised()
            : null
        );
    }

    private function configureVite(): void
    {
        Vite::useAggressivePrefetching();
    }

    private function configureModels(): void
    {
        Model::automaticallyEagerLoadRelationships();

        Model::shouldBeStrict();

        Model::unguard();
    }

    private function configureSleep(): void
    {
        Sleep::fake();
    }

    private function configureHttp(): void
    {
        URL::forceHttps();

        Http::preventStrayRequests();
    }

    private function configureDate(): void
    {
        Date::use(CarbonImmutable::class);
    }

    private function registerFilamentColors(): void
    {
        FilamentColor::register([
            'primary' => Color::Sky,
            'gray' => Color::Slate,
            'admin-primary' => Color::Amber,
        ]);
    }
}

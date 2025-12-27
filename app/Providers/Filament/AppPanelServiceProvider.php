<?php

namespace App\Providers\Filament;

use App\Filament\Admin\Pages\Auth\Login;
use App\Filament\App\Pages\Auth\EditProfile;
use App\Filament\App\Pages\Auth\Register;
use App\Services\PanelConfigurationService;
use Filament\Panel;
use Filament\PanelProvider;

class AppPanelServiceProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return PanelConfigurationService::configurePanel($panel)
            ->default()
            ->id('app')
            ->path(config()->string('filament-panels.app.path'))
            ->domain(config()->string('filament-panels.app.domain'))
            ->login(Login::class)
            ->registration(action: Register::class)
            ->profile(page: EditProfile::class, isSimple: false)
            ->emailVerification()
            ->emailChangeVerification()
            ->viteTheme('resources/css/filament/app/theme.css')
            ->discoverResources(in: app_path('Filament/App/Resources'), for: 'App\Filament\App\Resources')
            ->discoverPages(in: app_path('Filament/App/Pages'), for: 'App\Filament\App\Pages')
            ->pages([
                //
            ])
            ->discoverWidgets(in: app_path('Filament/App/Widgets'), for: 'App\Filament\App\Widgets')
            ->widgets([
                //
            ])
            ->plugins([
                //
            ])
            ->bootUsing(function (Panel $panel): void {
                //
            });
    }
}

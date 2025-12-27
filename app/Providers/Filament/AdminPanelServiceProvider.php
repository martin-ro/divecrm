<?php

namespace App\Providers\Filament;

use App\Filament\Admin\Pages\Auth\Login;
use App\Services\PanelConfigurationService;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;

class AdminPanelServiceProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return PanelConfigurationService::configurePanel($panel)
            ->id('admin')
            ->path(config()->string('filament-panels.admin.path'))
            ->domain(config()->string('filament-panels.admin.domain'))
            ->brandName('Admin')
            ->login(Login::class)
            ->colors([
                'primary' => Color::Amber,
                'gray' => Color::Slate,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\Filament\Admin\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\Filament\Admin\Pages')
            ->pages([
                //
            ])
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\Filament\Admin\Widgets')
            ->widgets([
                //
            ])
            ->plugins([
                //
            ])
            ->navigationGroups([
                NavigationGroup::make('User Management'),
                NavigationGroup::make('CMS'),
            ])
            ->bootUsing(function (Panel $panel): void {
                //
            });
    }
}

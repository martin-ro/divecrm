<?php

namespace App\Services;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\BasePage;
use Filament\Panel;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Platform;
use Filament\Tables\Table;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PanelConfigurationService
{
    public static function configurePanel(Panel $panel): Panel
    {
        return $panel
            ->registration(null)
            ->passwordReset()
            ->spa()
            ->colors([
                'primary' => Color::Sky,
                'gray' => Color::Slate,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->spa(false)
            ->plugins([
                //
            ])
            ->bootUsing(function (Panel $panel): void {
                // Striped tables
                Table::configureUsing(function (Table $table): void {
                    $table->striped()
                        ->deferLoading();
                });

                // Actions on right side
                BasePage::alignFormActionsEnd();
            })
            ->globalSearchFieldSuffix(fn (): ?string => match (Platform::detect()) {
                Platform::Windows, Platform::Linux => 'CTRL + K',
                Platform::Mac => '⌘ + K',
                default => null,
            })
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

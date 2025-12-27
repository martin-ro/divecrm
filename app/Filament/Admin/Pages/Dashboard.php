<?php

declare(strict_types=1);

namespace App\Filament\Admin\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Override;
use Schmeits\FilamentPhosphorIcons\Support\Icons\Phosphor;
use Schmeits\FilamentPhosphorIcons\Support\Icons\PhosphorWeight;

class Dashboard extends Page
{
    protected string $view = 'filament.admin.pages.dashboard';

    #[Override]
    public static function getNavigationIcon(): string|BackedEnum|Htmlable|null
    {
        return Phosphor::House->getIconForWeight(PhosphorWeight::Duotone);
    }

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [
            //
        ];
    }
}

<?php

namespace Zoker\Shop\Providers;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Zoker\FilamentStaticPages\StaticPages;

class FilamentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Yellow,
            ])
            ->discoverResources(in: __DIR__ . '/../../src/Filament/Resources', for: 'Zoker\\Shop\\Filament\\Resources')
            ->discoverResources(in: config('shop.filament.path', app_path('Filament/Resources')), for: config('shop.filament.namespace', 'App\\Filament\\Resources'))
            ->discoverPages(in: __DIR__ . '/../../src/Filament/Pages', for: 'Zoker\\Shop\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->plugin(StaticPages::make())
            ->plugins(config('shop.filament.plugins', []))
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'Zoker\\Shop\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
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

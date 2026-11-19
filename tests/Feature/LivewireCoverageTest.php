<?php

declare(strict_types=1);

use Illuminate\Auth\Access\AuthorizationException;
use Liberu\Accounting\BusinessInsightsLivewire\BusinessInsightsLivewireServiceProvider;
use Liberu\Accounting\BusinessInsightsLivewire\Livewire\Insights;
use Liberu\Accounting\Erp\Models\User;
use Livewire\Livewire;

it('renders accounting-business-insights-livewire livewire components', function (): void {
    $provider = $this->app->register(BusinessInsightsLivewireServiceProvider::class, force: true);
    if (method_exists($provider, 'boot')) { $provider->boot(); }
    expect($provider)->toBeInstanceOf(BusinessInsightsLivewireServiceProvider::class);


    $this->actingAs(User::factory()->create());

    $component = new Insights;
    if (method_exists($component, 'mount')) { $component->mount(); }
    expect($component->render())->not->toBeNull();
});

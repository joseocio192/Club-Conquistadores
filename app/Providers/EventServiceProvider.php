<?php

namespace App\Providers;

use App\Events\ClaseSaved;
use App\Events\ClubSaved;
use App\Events\ConquistadorSaved;
use App\Events\DirectivoSaved;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\EspecialidadSaved;
use App\Events\RequisitosSaved;
use App\Events\TareaSaved;
use App\Events\UnidadSaved;
use App\Listeners\SaveModelTranslation;
use App\Events\UserSaved;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ClaseSaved::class => [
            SaveModelTranslation::class,
        ],

        ClubSaved::class => [
            SaveModelTranslation::class,
        ],

        ConquistadorSaved::class => [
            SaveModelTranslation::class,
        ],

        DirectivoSaved::class => [
            SaveModelTranslation::class,
        ],

        EspecialidadSaved::class => [
            SaveModelTranslation::class,
        ],

        RequisitosSaved::class => [
            SaveModelTranslation::class,
        ],

        TareaSaved::class => [
            SaveModelTranslation::class,
        ],

        UnidadSaved::class => [
            SaveModelTranslation::class,
        ],

        UserSaved::class => [
            SaveModelTranslation::class,
        ],


    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}

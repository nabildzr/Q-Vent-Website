<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\User;
use App\Models\Attendee;
use App\Models\EventCategory;
use App\Models\EventRegistrationLink;
use App\Policies\EventPolicy;
use App\Policies\UserPolicy;
use App\Policies\AttendeePolicy;
use App\Policies\EventCategoryPolicy;
use App\Policies\EventRegistrationLinkPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Event::class => EventPolicy::class,
        User::class => UserPolicy::class,
        Attendee::class => AttendeePolicy::class,
        EventCategory::class => EventCategoryPolicy::class,
        EventRegistrationLink::class => EventRegistrationLinkPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}

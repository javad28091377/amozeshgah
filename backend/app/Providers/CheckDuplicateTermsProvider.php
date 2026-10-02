<?php

namespace App\Providers;

use App\Services\CheckDuplicateTermsService;
use App\Services\Contracts\CheckDuplicateTermsServiceInterface;
use Illuminate\Support\ServiceProvider;

class CheckDuplicateTermsProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CheckDuplicateTermsServiceInterface::class,CheckDuplicateTermsService::class);
    }

    public function boot(): void
    {
        //
    }
}

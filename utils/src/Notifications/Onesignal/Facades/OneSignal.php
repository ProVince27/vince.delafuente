<?php

namespace App\Facades\Notifications;

use App\Services\DatetimeService;
use Illuminate\Support\Facades\Facade;
use App\Services\Notifications\OneSignalService;

class OneSignal extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return OneSignalService::class;
    }
}

<?php

namespace LaravelWebauthn\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Cookie;
use LaravelWebauthn\Facades\Webauthn;

class LoginListener
{
    /**
     * Handle Login webhooks.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if (Webauthn::enabled($event->user)) {
            Cookie::queue(
                'webauthn_remember',
                $event->user->getAuthIdentifier(),
                60 * 24 * 30
            );
        }
    }
}

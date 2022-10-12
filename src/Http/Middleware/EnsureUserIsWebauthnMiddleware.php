<?php

namespace LaravelWebauthn\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Support\Facades\Redirect;
use LaravelWebauthn\Facades\Webauthn;
use App\Models\User;

class EnsureUserIsWebauthnMiddleware
{
    /**
     * The auth factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected AuthFactory $auth;

    /**
     * Create a Webauthn.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     */
    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Webauthn::webauthnEnabled() && Webauthn::check()) {;
            return $next($request);
        }

        return redirect()->back();
    }
}

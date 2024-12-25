<?php

namespace Zoker\Shop\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Zoker\Shop\Enums\Permission;

class MaintenanceModeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        abort_if(config('shop.maintenance_mode') && ! auth()->user()->hasPermission(Permission::ACCESS_ADMIN_PANEL), 503);

        return $next($request);
    }
}

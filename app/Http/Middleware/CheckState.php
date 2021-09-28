<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class CheckState
 * @package App\Http\Middleware
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class CheckState
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (array_key_exists('state', $request->header()) !== true) {
            abort(404);
        }

        $sState = Crypt::decryptString($request->header('state'));
        $this->validateState($sState);
        return $next($request);
    }

    /**
     * Validate state
     * @param string $sState
     * @return void
     */
    private function validateState(string $sState): void
    {
        if ((string)$sState !== (string)config('app.key')) {
            abort(404);
        }
    }
}

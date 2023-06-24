<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class XSS
 */
class XSS
{
    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $alllowed = [
            'services.store',
            'services.update',
            'cms.update',
        ];
        if (in_array($request->route()->getName(), $alllowed)) {
            return $next($request);
        }


        $input = $request->all();
        array_walk_recursive($input, function (&$input) {
            $input = (is_null($input)) ? null : strip_tags($input);
        });
        $request->merge($input);

        return $next($request);
    }
}

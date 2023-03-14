<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ShortCode;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class sCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
            $response = $next($request);
            $sCode = $response->getContent();
            foreach(ShortCode::all() as $rText){
                $sCode = str_replace($rText->sCode,$rText->replacewith,$sCode);
            }
            $response->setContent($sCode);
            return $response;
        
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Cache\RateLimiter;

class BlockIPs
{
 
    /**
     * The rate limiter instance.
     *
     * @var \Illuminate\Cache\RateLimiter
     */
    protected $limiter;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Cache\RateLimiter  $limiter
     * @return void
     */
    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Retrieve user's IP address
        $ipAddress = $request->ip();
    

        // Print user's IP address
        // print_r($ipAddress);

        // Check if too many attempts
        if ($this->limiter->tooManyAttempts($ipAddress, 100)) {
            return new Response('Too Many Requests', 429);
        }

        // Hit the limiter
        $this->limiter->hit($ipAddress);

        // Continue processing the request
        return $next($request);
    }
} 

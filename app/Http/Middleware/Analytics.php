<?php

namespace App\Http\Middleware;

use App\Models\Analytic;
use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class Analytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $session = $request->session()->getId();
        // Testing ip address for local development
        // $ip = '49.225.144.84';
        // Actual IP address in testing/producation
        $ip = $request->ip();
        $url = parse_url($request->url());

        if (isset($url['path'])) {
            $uri = $url['path'];
        } else {
            $uri = 'Path not found';
        }

        $agent = new Agent();
        $browser = $agent->browser();
        $os = $agent->platform();
        // Agent device metadata
        if ($agent->isDesktop()) {
            $meta = 'Desktop';
        } elseif ($agent->isMobile()) {
            $meta = $agent->device();
        } elseif ($agent->isRobot()) {
            $meta = $agent->robot();
        } else {
            $meta = 'Not detected';
        }
        // Find the post
        $post = Post::where('slug', last(request()->segments()))->first();
        if (empty($post)) {
            return $next($request);
        }
        // Check if record already exists
        $alreadyExists = Analytic::where('session', $session)->where('post_id', $post->id)->where('ip', $request->ip())->exists();
        if ($alreadyExists) {
            return $next($request);
        }
        // Get location data
        if (! empty(Location::get($ip))) {
            $country = Location::get($ip)->countryName;
            $countryISO = Location::get($ip)->isoCode;
        } else {
            $locationError = 'Failed to resolve';
        }
        // Add metrics to the table
        Analytic::create([
            'session' => $session,
            'uri' => $uri,
            'ip' => $ip,
            'country' => ! empty($country) ? $country.' ('.$countryISO.')' : $locationError,
            'browser' => $browser,
            'os' => $os,
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'post_id' => $post->id ? $post->id : null,
            'meta' => $meta,
        ]);

        return $next($request);
    }
}

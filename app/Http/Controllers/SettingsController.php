<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\Facades\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $settings = Setting::all();

        return view('settings.index', compact('user', 'settings'));
    }

    public function regional()
    {
        $user = Auth::user();

        return view('settings.regional', compact('user'));
    }

    public function analytics()
    {
        $user = Auth::user();

        return view('settings.analytics', compact('user'));
    }

    public function seo()
    {
        $user = Auth::user();

        return view('settings.seo', compact('user'));
    }

    public function mail()
    {
        $user = Auth::user();

        return view('settings.mail', compact('user'));
    }

    public function store(Request $request)
    {
        $settings = $request->all();

        foreach ($settings as $key => $value) {
            setting([$key => $value])->save();
        }

        if (setting()->get('self-register') == 0) {
            setting(['admin-notify' => 'off'])->save();
        }

        return redirect()->route('settings.index')->with('success', 'Settings saved.');
    }
}

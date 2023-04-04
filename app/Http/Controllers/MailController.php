<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('mail.index', compact('user'));
    }
}

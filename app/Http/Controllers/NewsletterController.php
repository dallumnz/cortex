<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::get()->all();
        $user = Auth::user();

        return view('newsletters.index', compact('user', 'newsletters'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Newsletter::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('newsletters.index')->with('success', 'Subscriber permanently deleted');
    }
}

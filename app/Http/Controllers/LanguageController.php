<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, String $locale)
    {
        session()->put('locale', $locale);
        app()->setLocale($locale);
        return redirect()->back();
    }
}

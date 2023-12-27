<?php

namespace App\Http\Controllers\v1;

use App\Models\UrlLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $collection = UrlLink::all();
        return view('v1.welcome', compact('collection'));
    }

    public function shortUrl(Request $request)
    {
        $request->validate([
            'short_url' => 'required'
        ]);

        $link = UrlLink::where('short_url', $request->short_url)->first();
        if($link){
            return redirect()->to($link->long_url);
        }else{
            return redirect()->to('/');
        }
    }
}

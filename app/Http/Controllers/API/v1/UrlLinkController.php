<?php

namespace App\Http\Controllers\API\v1;

use App\Models\UrlLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UrlLinkController extends Controller
{
    public function shorten(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),
            [
                'long_url' => 'required'
            ]);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validation fails',
                    'errors' => $validator->errors()
                ]);
            }
            $url = UrlLink::where('long_url', $request->long_url)->first();
            if($url){
                return response()->json([
                    'status' => false,
                    'message' => 'The url is already exists',
                    'short_url' => $url->short_url,
                    'long_url' => $request->long_url
                ]);
            }else{
                $short_url = time();
                $linkUrl = UrlLink::create([
                    'long_url' => $request->long_url,
                    'short_url' => $short_url,
                    'user_id' => Auth::id(),
                    'view_count' => 0
                ]);
    
                return response()->json([
                    'status' => true,
                    'message' => 'Url shotern successful',
                    'short_url' => $short_url,
                    'long_url' => $request->long_url
                ], 200);
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function listUrl()
    {
        try {
            $urls = UrlLink::where('user_id', Auth::id())->get();
            $data = $urls->map(function($url){
                return [
                    'short_url' => $url->short_url,
                    'long_url' => $url->long_url
                ];
            });
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}

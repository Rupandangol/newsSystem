<?php

namespace App\Http\Controllers;

use App\Model\NewsRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ajaxController extends Controller
{
    function rating(Request $request)
    {
        $data['rating'] = $request->rating_val;
        $data['news_id'] = $request->news_val;
        $data['sub_id'] = Auth::guard('subscriber')->user()->id;
        if (NewsRating::create($data)) {
            return response()->json($data);
        }

    }
}

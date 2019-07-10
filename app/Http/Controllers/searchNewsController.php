<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\News;
use App\Model\NewsSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchNewsController extends Controller
{
    public function search(Request $request)
    {
        $data['category'] = Category::all();
        $search=$request->searchKey;
        $data['item']=News::where('title','like','%'.$search.'%')->get();
        return view('Frontend.pages.search',$data)->with('searchItem',$search);
    }
}

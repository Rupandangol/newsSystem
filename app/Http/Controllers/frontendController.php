<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\News;
use App\Model\NewsCategory;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    private $_view = 'Frontend.pages';

    public function index()
    {
        $data['category'] = Category::all();
        $data['news'] = News::all();
        return view($this->_view . '.all', $data);
    }

    public function process($category, $id)
    {
        $data['news'] = NewsCategory::where(['categories_id' => $id])->get();
        $data['category']=Category::all();
        return view($this->_view.'.page',$data)->with('categoryItem', $category);
    }

}

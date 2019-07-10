<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\News;
use App\Model\NewsCategory;
//use Faker\Provider\Image;
use App\Model\NewsSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class newsController extends Controller
{
    public function index()
    {
        return view('Backend.pages.dashboard');
    }


//    Category Start


    public function addCategory()
    {
        session()->flash('left-tab', 'category');
        $data['category'] = Category::paginate(4);
        return view('Backend.pages.Category.addCategory', $data);
    }

    public function addCategoryAction(Request $request)
    {

        $this->validate($request, [
            'category' => 'required'
        ]);

        $data['category'] = $request->category;
        $data['status'] = $request->status;

        if (Category::create($data)) {
            return redirect()->back()->with('success', 'Category Added');
        }
        return redirect()->back()->with('fail', 'failed');
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('fail', 'Category Deleted');
    }

    public function updateCategory($id)
    {
        $data['category'] = Category::find($id);
        return view('Backend.pages.Category.updateCategory', $data);
    }

    public function updateCategoryAction(Request $request)
    {

        $this->validate($request, [
            'category' => 'required'
        ]);
        $data['category'] = $request->category;
        $data['status'] = $request->status;
        $id = $request->id;
        if (Category::find($id)->update($data)) {
            return redirect()->to('/@admin@/addCategory')->with('success', 'Category Updated');
        }
        return redirect()->back()->with('fail', 'Failed');

    }

//    end Category


//    start News

    public function addNews()
    {
        $data['category'] = Category::all();
        return view('Backend.pages.News.addNews', $data);
    }


    public function addNewsAction(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'details' => 'required',
            'image' => 'required',
            'metaKeywords' => 'required'
        ]);
        $data['title'] = $request->title;
        $data['date'] = $request->date;
        $data['details'] = $request->details;
        $data['reporter']=Auth::guard('admin')->user()->username;
        $categories = $request->category;
        $metaKey = explode(',', $request->metaKeywords);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->extension());
            $newName = time() . '_.' . $extension;
            Image::make($file)->resize(700, 500, function ($ar) {
                $ar->aspectRatio();
            })->crop(700, 700)->save(public_path('Uploads/News/' . $newName));
            $data['image'] = $newName;
        }
        if ($news = News::create($data)) {

            foreach ($categories as $value) {
                $item['categories_id'] = $value;
                $item['news_id'] = $news->id;
                NewsCategory::create($item);
            }
            foreach ($metaKey as $metaValue) {
                $metaData['metaKeywords'] = $metaValue;
                $metaData['news_id'] = $news->id;
                NewsSearch::create($metaData);
            }

            return redirect()->back()->with('success', 'News Added');
        }
        return redirect()->back()->with('fail', 'Failed');


    }


    public function manageNews()
    {
        $data['news'] = News::all();
        return view('Backend.pages.News.manageNews', $data);
    }

    public function deleteNews($id)
    {
        News::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function editNews($id)
    {
        $data['news'] = News::find($id);
        $data['category'] = Category::all();
        return view('Backend.pages.News.editNews', $data);
    }

    public function editNewsAction(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'details' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);

        $data['title'] = $request->title;
        $data['date'] = $request->date;
        $data['details'] = $request->details;


    }


//    end News


}

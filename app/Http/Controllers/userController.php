<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\News;
use App\Model\NewsCategory;
use App\Model\NewsRating;
use App\Model\Subscriber;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function addUser()
    {
        return view('Backend.pages.user.addUser');
    }

    public function addUserAction(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:subscribers,username',
            'email' => 'required|unique:subscribers,email',
            'password' => 'required|confirmed|min:4',
            'address' => 'required'
        ]);
        $data['username'] = ucfirst($request->username);
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['address'] = ucfirst($request->address);
        if (Subscriber::create($data)) {
            return redirect()->to('/@admin@/manageUser')->with('success', 'Subscriber Added');
        }
        return redirect()->back()->with('fail', 'failed');
    }

    public function manageUser()
    {
        $data['subscriber'] = Subscriber::all();
        return view('Backend.pages.user.manageUser', $data);
    }

    public function deleteUser($id)
    {
        Subscriber::find($id)->delete();
        return redirect()->back()->with('deleted', 'Deleted');
    }

    public function updateUser($id)
    {
        $data['item'] = Subscriber::find($id);
        return view('Backend.pages.user.updateUser', $data);
    }

    public function updateUserAction(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:subscribers,username',
            'email' => 'required|unique:subscribers,email',
            'password' => 'required|confirmed',
            'address' => 'required'
        ]);
        $data['username'] = ucfirst($request->username);
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['address'] = ucfirst($request->address);
        $id = $request->id;
        if (Subscriber::find($id)->update($data)) {
            return redirect()->to('/@admin@/manageUser')->with('success', 'Updated');

        }
        return redirect()->back()->with('fail', 'Failed');

    }

    public function dashboard()
    {
        $data['category'] = Category::all();
        return view('Frontend.pages.User.userDash', $data);
    }


    public function categoryPage($category, $id)
    {
        $categoryData['item'] = NewsCategory::where(['categories_id' => $id])->orderBy('created_at', 'DESC')->get();
        $categoryData['category'] = Category::all();
        return view('Frontend.pages.User.category', $categoryData, ['categoryTitle' => $category]);

    }


    public function viewPage($id)
    {
        $data['category'] = Category::all();
        $data['detailNews'] = News::find($id);
        $data['relatedCategory'] = NewsCategory::where(['news_id' => $id])->get();
        return view('Frontend.pages.User.newsPage', $data);
    }

    public function userAll()
    {
        $data['category'] = Category::all();
        $data['news'] = News::all()->sortByDesc('created_at');
        return view('Frontend.pages.User.userAll', $data);
    }

//    search

    public function Search(Request $request)
    {
        $data['category'] = Category::all();
        $search=$request->search;
        $data['searchQuery']=News::where('title','like','%'.$search.'%')->orderBy('created_at','DESC')->get();
        return view('Frontend.pages.User.userSearch', $data)->with('searchKey',$search);
    }
}

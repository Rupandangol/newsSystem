<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{

    private $_view = 'Backend.pages.Admin';

    public function addAdmin()
    {
        session()->flash('left-tab','admin');
        session()->flash('left-tab-Admin','addAdmin');
        return view($this->_view . '.addAdmin');
    }

    public function addAdminAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'address' => 'required',
            'password' => 'required|confirmed|min:4'
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['password'] = bcrypt($request->password);
        $data['type'] = $request->type;

        if (Admin::create($data)) {
            return redirect()->back()->with('success', 'Admin Added');
        }
        return redirect()->back()->with('fail', 'Failed');

    }

    public function manageAdmin()
    {
        session()->flash('left-tab','admin');
        session()->flash('left-tab-Admin','manageAdmin');
        $data['admin'] = Admin::all();
        return view($this->_view . '.manageAdmin', $data);
    }


    public function deleteAdmin($id)
    {
        Admin::find($id)->delete();
        return redirect()->back()->with('deleted', 'Deleted');
    }

    public function updateAdmin($id)
    {
        $data['admin'] = Admin::find($id);
        return view($this->_view . '.updateAdmin', $data);
    }

    public function updateAdminAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:4'
        ]);

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['password'] = bcrypt($request->password);
        $data['type'] = $request->type;
        $id=$request->id;

        if(Admin::find($id)->update($data)){
            return redirect()->to('/@admin@/manageAdmin')->with('success','Updated');
        }
        return redirect()->back()->with('fail','failed');
    }
}

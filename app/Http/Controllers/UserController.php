<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserAddRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('phuong');
    }
    public function getlistuser()
    { 
        return User::all();   
    }
    public function index()
    {
        return view('back_end.user.list');    
    }
    public function store(UserAddRequest $request)
    {
        try{
            $users = new User;
            $users->name = $request->user_name_add;
            $users->email = $request->user_email_add;
            $users->password = encrypt('12345');
            $users-> save(); 
            return redirect()->back()->with('message', 'Cập nhật thành công!'); 
        } 
        catch(\Exception $e) {
            return redirect()->back()->with('message1', 'Trùng !'); 
        } 
    }
    public function edit($id)
    {
        return User::findorfail($id);   
    }
    public function update($id,Request $request){
        $users = User::findorfail($id);
        $users->name = $request->user_name_edit;
        $users->email = $request->user_email_edit;
        $users-> save();
        return redirect()->back()->with('message', 'Cập nhật thành công!'); 
    }    
    public function destroy(Request $request)
    {
        $users = User::all();
        $checked = $request->input('checked');

        User::destroy($checked);
        return redirect()->back();   
    }    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserAddRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Danh Sách
    public function getlist()
    {
        return User::all();	
    }
    public function index()
    {
        return view('back_end.user.list') ;    
    }
    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->user_name_add;
        $users->email = $request->user_mail_add;
        $users-> save();    
    }
    //Đến trang Sửa
    public function show($id)
    {
        return User::findorfail($id); 	
    }
    public function edit($id)
    {
        return User::findorfail($id);   
    }
    //Sửa
    public function update($id,Request $request){
        $users = User::findorfail($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users-> save();
    }    
    //Xóa
    public function destroy(Request $request)
    {
        $users = User::all();
        $checked = $request->input('checked');

        User::destroy($checked);
        return redirect()->back();   
    }    
}

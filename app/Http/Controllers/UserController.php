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
        $users->name = $request->user_name;
        $users->email = $request->user_mail;
        $users-> save();   
    }
    //Đến trang Sửa
    public function getedit($id)
    {
        $users = User::find($id); 
        return view('Back_end.User.edit',compact('users')); 	
    }
    //Sửa
    public function postedit($id,UserEditRequest $request){
        $users = User::find($id);
        $users->name = $request->user_name;
        $users->email = $request->user_email;
        $users-> save();
        return redirect()->back()->with('message', 'Cập nhật thành công!');  
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

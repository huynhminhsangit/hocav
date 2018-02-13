<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getlistpersonal()
    {
        return User::find(Auth::user()->id);    
    }
    public function index()
    {
        return view('back_end.user.personal') ;    
    }
    public function editpass()
    {
        return view('back_end.user.changepass');    
    }
    public function posteditpass(Request $request)
    {
        if(Hash::check($request->password_old,Auth::user()->password))
            {
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->password_new);
                $users-> save();
                return redirect()->back()->with('message', 'Cập nhật thành công!'); 
            }
            else
                return redirect()->back()->with('message1', 'Sai mật khẩu cũ');
    }
    //Đến trang Sửa
          public function postedit(Request $request)
        {
            $users = User::find(Auth::user()->id);

            if($request->hasFile('image'))
            {               
                $file_name=$request->file('image')->getClientOriginalName();
                $users->name = $request->user_name_personal;
                $users->email = $request->user_email_personal;
                $users->image = $file_name;
                $request->file('image')->move('upload/',$file_name);
                $users-> save();
                return redirect()->back()->with('message', 'Cập nhật thành công!');            
            }
            $users->name = $request->user_name_personal;
            $users->email = $request->user_email_personal;
            $users-> save();
            return redirect()->back()->with('message', 'Cập nhật thành công!');  
        }
}

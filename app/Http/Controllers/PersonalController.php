<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
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
                return response()->json(['success' => 'Sửa Mật Khẩu Thành Công']);
            }
            else
                return response()->json(['error' => 'Sai Mật Khẩu Cũ']);
        }
    //Đến trang Sửa
        public function postedit(Request $request)
        {
            $users = User::find(Auth::user()->id);

            if($request->hasFile('file'))
            {           
                $image = $request->file('file');
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                File::delete(public_path('img_avatar/'.$users->avatar));                   
                Image::make($image)->resize(500, 500)->save('img_avatar/'.$filename);
                $users->avatar = $filename;
                $users->name = $request->name;
                $users->email = $request->email;                          
                $users-> save();
                return response()->json(['success' => 'Cập Nhật Thành Công']);          
            }
            else
                $users->name = $request->name;
            $users->email = $request->email;
            $users-> save();
            return response()->json(['error' => 'Cập Nhật Thành Công']);
        }
    }

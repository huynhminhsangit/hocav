<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    public function store(Request $request)
    {
        try{
            $users = new User;
            $users->name = $request->user_name_add;
            $users->email = $request->user_email_add;
            $users->password = bcrypt('12345');
            $users-> save(); 
            return response()->json(['success' => 'Thêm Thành Công']);
        } 
        catch(\Exception $e) {
            return response()->json(['error' => 'Trùng']);
        } 
    }
    public function edit($id)
    {
        return User::findorfail($id);   
    }
    public function update($id,Request $request){
        try{
            $users = User::findorfail($id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users-> save();
            return response()->json(['success' => 'Sửa Thành Công']);
        } 
        catch(\Exception $e) {
            return response()->json(['error' => 'Trùng']);
        } 
    }    
    public function destroy($id)
    {
        User::destroy($id);       
    }    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAction;
use Illuminate\Support\Facades\Auth;
class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('phuong');
    }
    public function index()
    {   
        $history=UserAction::all(); 
        return view('back_end.history.list',compact('history'));    
    }
    public function destroy(Request $request)
    {
        $users = UserAction::all();
        $checked = $request->input('checked');

        UserAction::destroy($checked);
        return redirect()->back()->with('message', 'Cập nhật thành công!');  
    }    
}

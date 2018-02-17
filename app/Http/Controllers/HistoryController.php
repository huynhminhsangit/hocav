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
    public function getlisthistory()
    {                 
        return UserAction::all();    
    }
    public function index()
    {   
        return view('back_end.history.list');    
    }
    public function destroy(Request $request)
    {
        UserAction::destroy($request->id);
    }    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('phuong');
    }
    public function getlistclient()
    {
        return Client::all();     
    }
    public function index()
    {
        return view('back_end.client.list');    
    }
    public function edit($id)
    {
        return Client::findorfail($id);   
    }
    public function update($id,Request $request){
        try{
            $client = Client::findorfail($id);
            $client->name = $request->name;
            $client->email = $request->email;
            $client-> save();
            return response()->json(['success' => 'Sửa Thành Công']);
        } 
        catch(\Exception $e) {
            return response()->json(['error' => 'Trùng']);
        } 
    }    
    public function destroy($id)
    {
        Client::destroy($id);       
    }    
}

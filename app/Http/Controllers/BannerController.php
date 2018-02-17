<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('phuong');
    }
    public function getlistbanner()
    {   
        return Banner::all();    
    }
    public function index()
    {   
        return view('back_end.banner.list');    
    }
    public function destroy(Request $request,$id)
    {
        $banner = Banner::find($id);
        

        Banner::destroy($id);
        Storage::disk('public1')->delete('banner/'.$banner->image); 
    }
    public function store(Request $request)
    {
        try{
            $banner = new Banner;
            
            $banner->name = $request->banner_name_add;
            $banner->height = $request->banner_height_add;
            $banner->width = $request->banner_width_add;
            $bannername = $request->file('file')->store('banner', 'public1');
            $banner->image = basename($bannername);
                       
            $banner-> save();
            return response()->json(['success' => 'Thêm Thành Công']);
        } 
        catch(\Exception $e) {
             return response()->json(['error' => 'Trùng']);
        } 

    }    
}

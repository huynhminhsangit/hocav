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
    public function index()
    {   
        $banner=Banner::all(); 
        return view('back_end.banner.list',compact('banner'));    
    }
    public function destroy(Request $request)
    {
        $checked = $request->input('checked');
        $banner = Banner::find($checked);
        

        Banner::destroy($checked);
        Storage::disk('public1')->delete('banner/'.$banner->image); 
        return redirect()->back()->with('message', 'Cập nhật thành công!');  
    }
    public function store(Request $request)
    {
        try{
            $banner = new Banner;
            
            $banner->name = $request->banner_name_add;
            $banner->height = $request->banner_height_add;
            $banner->width = $request->banner_width_add;
            $thumbname = $request->file('banner')->store('thumb', 'public1');
            $bannername = $request->file('banner')->store('banner', 'public1');
            $banner->thumb = basename($thumbname);
            $banner->image = basename($bannername);
                       
            $banner-> save();
            return redirect()->back()->with('message', 'Cập nhật thành công!');
        } 
        catch(\Exception $e) {
            return redirect()->back()->with('message1', 'Trùng !'); 
        } 

    }    
}

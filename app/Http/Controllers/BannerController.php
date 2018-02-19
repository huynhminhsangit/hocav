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
  public function edit($id){
    return Banner::findorfail($id);
  } 
  public function destroy(Request $request,$id)
  {
    $banner = Banner::find($id);
    

    Banner::destroy($id);
    Storage::disk('public1')->delete('banner/'.$banner->image); 
  }
  public function setbanner($id)
  {
      Banner::where('set_up', '=', 1)->update(['set_up' => 0]);

      $banner = Banner::findorfail($id);
      $banner->set_up = 1;
      $banner-> save();
  }
  public function namebanner(Request $request)
  {
      return Banner::where('set_up', '=', 1)->firstOrFail();
  }
  public function store(Request $request)
  {
    try{
      $banner = new Banner;
      
      $banner->name = $request->banner_name_add;
      $banner->height = $request->banner_height_add;
      $banner->set_up = 0;
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
 public function update($id,Request $request){
  try{
    $banner = Banner::findorfail($id);
    if($request->hasFile('edit_file'))
    {        
      Storage::disk('public1')->delete('banner/'.$banner->image);  
      $banner->name = $request->name;
      $banner->height = $request->height;
      $banner->width = $request->width;
      $banner->set_up = 0;                      
      $bannername = $request->file('edit_file')->store('banner', 'public1');
      $banner->image = basename($bannername);

      $banner-> save();
      return response()->json(['success' => 'Sửa Thành Công']); 
    }
    else
    {
     $banner->name = $request->name;
     $banner->height = $request->height;
     $banner->width = $request->width;
     $banner->set_up = 0;
     $banner-> save();
     return response()->json(['success' => 'Sửa Thành Công']);
   }

 } 
 catch(\Exception $e) {
  return response()->json(['error' => 'Trùng']);
} 
}     
}

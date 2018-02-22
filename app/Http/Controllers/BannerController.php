<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
class BannerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
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
    File::delete(public_path('img_banner/'.$banner->image));
  }
  public function setbanner($id)
  {
    Banner::where('set_up', 1)->update(['set_up' => 0]);

    $banner = Banner::findorfail($id);
    $banner->set_up = 1;
    $banner-> save();
  }
  public function namebanner()
  {
    try{
      return Banner::where('set_up',1)->firstOrFail();
    } 
    catch(\Exception $e) {
      return response()->json(['error' => 'Không Có']);
   } 

 }
 public function store(Request $request)
 {
  $image = $request->file('file');
  $filename  = time() . '.' . $image->getClientOriginalExtension();
  try{
    $banner = new Banner;
    $banner->name = $request->banner_name_add;
    $banner->set_up = 0;
    $banner->image = $filename;     
    Image::make($image)->resize(2000, 400)->save('img_banner/'.$filename);

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
      $image = $request->file('edit_file');
      $filename  = time() . '.' . $image->getClientOriginalExtension();
      File::delete(public_path('img_banner/'.$banner->image));
      $banner->name = $request->name;
      $banner->set_up = 0;
      $banner->image = $filename;                       
      Image::make($image)->resize(2000, 400)->save(public_path('img_banner/'.$filename));

      $banner-> save();
      return response()->json(['success' => 'Sửa Thành Công']); 
    }
    else
    {
     $banner->name = $request->name;
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

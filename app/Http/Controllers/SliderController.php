<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
class SliderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function getlistslider()
  {   
    return Slider::all();    
  }
  public function index()
  {   
    return view('back_end.slider.list');    
  }
  public function destroy(Request $request,$id)
  {

    $slider = Slider::find($id);

    Slider::destroy($id);
    File::delete(public_path('img_slider/'.$slider->image));
  }
  public function store(Request $request)
  {
    $image = $request->file('file');
    $filename  = time() . '.' . $image->getClientOriginalExtension();
    try{
      $slider = new Slider;
      $slider->name = $request->slider_name_add;
      $slider->set_up = 0;
      $slider->image = $filename;     
      Image::make($image)->resize(1000, 260)->save('img_slider/'.$filename);

      $slider-> save();
      return response()->json(['success' => 'Thêm Thành Công']);
    } 
    catch(\Exception $e) {
     return response()->json(['error' => 'Trùng']);
   } 

 } 
 public function update($id,Request $request){
  try{
    $slider = Slider::findorfail($id);

    if($request->hasFile('edit_file'))
    {        
      $image = $request->file('edit_file');
      $filename  = time() . '.' . $image->getClientOriginalExtension();
      File::delete(public_path('img_slider/'.$slider->image));
      $slider->name = $request->name;
      $slider->set_up = 0;
      $slider->image = $filename;                       
      Image::make($image)->resize(1000, 260)->save(public_path('img_slider/'.$filename));

      $slider-> save();
      return response()->json(['success' => 'Sửa Thành Công']); 
    }
    else
    {
     $slider->name = $request->name;
     $slider->set_up = 0;
     $slider-> save();
     return response()->json(['success' => 'Sửa Thành Công']);
   }

 } 
 catch(\Exception $e) {
  return response()->json(['error' => 'Trùng']);
} 
} 
public function edit($id){
  return Slider::findorfail($id);
}
public function setslider1($id)
{
  Slider::where('set_up', '=', 1)->update(['set_up' => 0]);

  $slider = Slider::findorfail($id);
  $slider->set_up = 1;
  $slider-> save();
} 
public function setslider2($id)
{
  Slider::where('set_up', '=', 2)->update(['set_up' => 0]);

  $slider = Slider::findorfail($id);
  $slider->set_up = 2;
  $slider-> save();
} 
public function setslider3($id)
{
  Slider::where('set_up', '=', 3)->update(['set_up' => 0]);

  $slider = Slider::findorfail($id);
  $slider->set_up = 3;
  $slider-> save();
}
public function nameslider1()
{
  try{
    return Slider::where('set_up', 1)->firstOrFail();
  } 
  catch(\Exception $e) {
    return response()->json(['error' => 'Không Có']);
  } 
}
public function nameslider2()
{
  try{
    return Slider::where('set_up', 2)->firstOrFail();
  } 
  catch(\Exception $e) {
    return response()->json(['error' => 'Không Có']);
  } 
}
public function nameslider3()
{
  try{
    return Slider::where('set_up', 3)->firstOrFail();
  } 
  catch(\Exception $e) {
    return response()->json(['error' => 'Không Có']);
  } 
}  
}

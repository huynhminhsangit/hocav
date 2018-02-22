<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Slider;
class ShowController extends Controller
{

  public function showbanner(Request $request)
  {
    try{
      return Banner::where('set_up', 1)->firstOrFail();
    } 
    catch(\Exception $e) {
      return response()->json(['error' => 'Không Có']);
    } 
  }  
  public function showslider1(Request $request)
  {
    try{
      return Slider::where('set_up', 1)->firstOrFail();
    } 
    catch(\Exception $e) {
      return response()->json(['error' => 'Không Có']);
    }
  } 
  public function showslider2(Request $request)
  {
    try{
      return Slider::where('set_up', 2)->firstOrFail();
    } 
    catch(\Exception $e) {
      return response()->json(['error' => 'Không Có']);
    }
  }   
  public function showslider3(Request $request)
  {
    try{
      return Slider::where('set_up', 3)->firstOrFail();
    } 
    catch(\Exception $e) {
      return response()->json(['error' => 'Không Có']);
    }
  }          
}

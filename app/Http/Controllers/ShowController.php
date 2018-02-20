<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Slider;
class ShowController extends Controller
{

  public function showbanner(Request $request)
  {
      return Banner::where('set_up', '=', 1)->firstOrFail();
  }  
  public function showslider1(Request $request)
  {
      return Slider::where('set_up', '=', 1)->firstOrFail();
  } 
  public function showslider2(Request $request)
  {
      return Slider::where('set_up', '=', 2)->firstOrFail();
  }   
  public function showslider3(Request $request)
  {
      return Slider::where('set_up', '=', 3)->firstOrFail();
  }          
}

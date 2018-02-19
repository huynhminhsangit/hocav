<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
class ShowBannerController extends Controller
{

  public function showbanner(Request $request)
  {
      return Banner::where('set_up', '=', 1)->firstOrFail();
  }     
}

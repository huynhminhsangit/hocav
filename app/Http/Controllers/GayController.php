<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Socialite;
class GayController extends Controller
{
    public function __construct()
  {
    $this->middleware('client');
  }
    public function gay() {
        return view('front_end.gay'); 
    }
}

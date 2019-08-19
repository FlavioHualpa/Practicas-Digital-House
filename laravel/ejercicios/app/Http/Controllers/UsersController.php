<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function profile() {
      $user = Auth::user();
      if ($user == null) {
         return redirect('/home');
      }

      return view('users.profile', [ 'user' => $user ]);
   }
}

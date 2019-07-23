<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\UserDetail;

class UserController extends Controller
{
    public function viewProfile(){
      return view('admin.user.profile');
    }

    public function saveProfilePicture(Request $request){
      $dati = $request->all();
      $img = Storage::put('profile_pictures', $dati['profile_img']);
      if (!empty(Auth::user()->userDetail)) {
        Auth::user()->userDetail->profile_picture = $img;
        Auth::user()->userDetail->save();
      } else {
        $userDetail = new UserDetail();
        $userDetail->profile_picture = $img;
        $userDetail->user_id = Auth::user()->id;
        $userDetail->save();
      }

      return redirect()->route('admin.profile');
    }
}

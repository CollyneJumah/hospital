<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use File;
class UserAccountController extends Controller
{
    //
    public function index(){
        return view('crud.profile.index', array('user' => Auth::user()));
    }
    public function update(Request $request){

        //handle user upload image
        if($request->hasFile('avatar'))
        {
            $avatar= $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();

            //delete user image
            if(Auth::user()->avatar !== 'avatar.png' ){
                $file =public_path('storage/user_images/'.Auth::user()->avatar);
                if(File::exists($file)){
                        unlink($file);
                }
            }


            Image::make($avatar)->save( public_path('storage/user_images/' .$filename));

            //get current user
            $user =Auth::user();
            $user->avatar =$filename;
            $user->save();
        }
        return view('crud.profile.index', array('user' => Auth::user()));
    }
}

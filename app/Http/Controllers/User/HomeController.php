<?php

namespace App\Http\Controllers\User;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{
    public function index() {
        $hour = date('H')+ 2; //provvisorio, rivedere timezone !!!
       
        $greeting = ($hour > 17) ? "Buona sera, " : (($hour > 12) ? "Buon pomeriggio, " : "Buon giorno, ");
        return view("user.home", ['greeting' => $greeting]); 
    }


    function upload(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if($request->hasFile('avatar_url')){

            //$filename=request()->file('avatar_url')->getClientOriginalName(); prende il nome originale del file

            $filename=($user->name .'_avatar.jpg');
            request()->file('avatar_url')->storeAs('users', $user->name.'/'. $filename );
            $user->update(['avatar_url'=>$filename]);

        return redirect()->back();

        }else{
            return redirect()->back();
        }
    
    }

}


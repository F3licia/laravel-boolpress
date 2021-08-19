<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller

{
    public function index() {
        $hour = date('H');
        $greeting = ($hour > 17) ? "Buon pomeriggio, " : (($hour > 12) ? "Buona sera, " : "Buon giorno, ");

        return view("user.home", ['greeting' => $greeting]); 
    }
   
}
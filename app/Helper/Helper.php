<?php

use Illuminate\Support\Facades\Auth;

class Helper{

    public static function authUserId(){
        return Auth::user()->id;
    }
    
}
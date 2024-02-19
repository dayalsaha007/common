<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LanguageController extends Controller
{
    
            function language(){

                return  view('backend.language.language');

            }

     public function switchLang($lang)
            {
        if (array_key_exists($lang, Config::get('languages'))) { 
            Session::put('applocale', $lang);

            return response()->json(['status'=>'success', 'message'=>'Language Change Successfully']);
            
        }

    }




}

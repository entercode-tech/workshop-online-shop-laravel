<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data['title'] = env('APP_NAME');
        return view('index',$data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // 添加调用,编写view
    public function __invoke(){
        return view('admin.layouts.app');
    }
}

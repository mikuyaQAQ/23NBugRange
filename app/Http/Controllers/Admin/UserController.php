<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function index()
    // {
    //     // 只获取最新的用户
    //     $users = User::latest()->get();

    //     return $users;
    // }
    // public function store()
    // {
    //     return User::create([
    //         'name' => request('name'),
    //         'email' => request('email'),
    //         'password' => bcrypt(request('password')),
    //     ]);
    // }

}

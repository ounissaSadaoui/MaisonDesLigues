<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
        
    public function index(): View
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}

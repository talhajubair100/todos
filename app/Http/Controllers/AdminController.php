<?php

namespace App\Http\Controllers;
use App\Models\todo;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $data['todos'] = todo::with('categories')->where('user_id', Auth::user()->id)->where('status', '1')->orderByDesc('created_at')->get();

        return view('dashboard', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedController extends Controller
{
    public function redirect()
    {
        if (Auth::user()->role == 'admin') {
           return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'tenant-admin') {
            return redirect()->route('tenant-admin.dashboard');
        } elseif (Auth::user()->role == 'user') {
            return redirect()->route('user.dashboard');
        } else {
            return auth()->logout();
        }
    }
}

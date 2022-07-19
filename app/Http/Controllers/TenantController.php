<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function invitation(Request $request, User $user)
    {
        if (!$request->hasValidSignature() || $user->password) {
            abort(401);
        }

        auth()->login($user);

        return redirect('/redirect');
    }
}

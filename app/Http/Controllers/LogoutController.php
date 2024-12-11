<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // 刪除session
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}

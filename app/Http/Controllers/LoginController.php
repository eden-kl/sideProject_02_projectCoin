<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', ['login_page' => true,]);
    }

    public function doLogin(Request $request)
    {
        $input = $request->post();
        $acc = $input['acc'];
        $pw = $input['password'];
        $rs = Account::select(DB::raw('trim(acc) as acc, password, name'))
            ->where('acc', '=', $acc)
            ->first();
        if (empty($rs)) {
            session()->flash('error', '登入錯誤');
            return redirect()->route('login.index');
        }else{
            if (Hash::check($pw, $rs->password)) {
                $request->session()->put('isLogin', true);
                $request->session()->put('acc', $acc);
                $request->session()->put('name', Crypt::decryptString($rs->name));
                session()->flash('success', '登入成功');
                return redirect()->route('dashboard.index');
            }else{
                session()->flash('error', '登入錯誤');
                return redirect()->route('login.index');
            }
        }
    }
}

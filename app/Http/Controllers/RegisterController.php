<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register',['register_page' => true,]);
    }

    public function doRegister(Request $request)
    {
        $input = $request->post();
        $acc = $input['acc'];
        $pw = $input['password'];
        $retypePw = $input['retypePassword'];
        $name = $input['name'];
        if (trim($pw) == trim($retypePw)) {
            // 相同
            // 查詢帳號是否重複
            if (Account::where('acc', $acc)->exists()) {
                // 有重複
                session()->flash('error', '帳號已被使用');
                return redirect()->route('register.index');
            }else{
                // 無重複
                // 新增
                $rs = Account::create([
                    'acc' => $acc,
                    'password' => Hash::make($pw),
                    'name' => Crypt::encryptString($name),
                ]);
                if ($rs) {
                    session()->flash('success', '註冊成功');
                    return redirect()->route('login.index');
                }else{
                    session()->flash('error', '註冊失敗');
                    return redirect()->route('register.index');
                }
            }
        }else{
            session()->flash('error', '確認密碼與密碼不同');
            return redirect()->route('register.index');
        }
    }
}

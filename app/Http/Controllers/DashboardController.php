<?php

namespace App\Http\Controllers;


use App\Models\Record;
use App\Models\Target;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 取得目標金額
        $goalAmount = Target::select('goal')->where('acc', $request->session()->get('acc'))->first();
        // 已達成金額
        $finishAmount = Record::where('acc', $request->session()->get('acc'))
            ->sum('target');
        // 未達成金額
        $unFinishAmount = $goalAmount->goal - $finishAmount;
        // 達成進度%
        $finishPercentage = floor($finishAmount / $goalAmount->goal * 100);
        $data = [
            'menu_type' => 'dashboard',
            'goalAmount' => $goalAmount,
            'finishAmount' => $finishAmount,
            'unFinishAmount' => $unFinishAmount,
            'finishPercentage' => $finishPercentage,
            'name' => $request->session()->get('name'),
            'acc' => $request->session()->get('acc'),
        ];
        return view('dashboard', $data);
    }
}

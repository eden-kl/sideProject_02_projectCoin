<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * @return Factory|View|Application|\Illuminate\View\View
     * 主畫面
     */
    public function index(Request $request)
    {
        // 取得紀錄
        $rs = Record::select('target', 'date')
            ->where('acc', $request->session()->get('acc'))
            ->orderBy('date', 'desc')
            ->get()
            ->toArray();
        $totalAmount = Record::where('acc', $request->session()->get('acc'))
            ->sum('target');
        $data = [
            'menu_type' => 'record',
            'data' => $rs,
            'totalAmount' => $totalAmount,
            'name' => $request->session()->get('name'),
            'acc' => $request->session()->get('acc'),
        ];
        return view('record', $data);
    }

    public function ajax_addRecord(Request $request)
    {
        $input = $request->post();
        $amount = $input['amount'];
        $date = $input['date'];
        // 新增紀錄
        $rs = Record::create([
            'acc' => $request->session()->get('acc'),
            'target' => $amount,
            'date' => $date,
            ]);
        if (!$rs) {
            // 失敗
            $data = [
                'status' => false,
                'RtnCode' => 1,
                'RtnMsg' => '新增紀錄失敗',
            ];
        }else{
            // 成功
            $data = [
                'status' => true,
                'RtnCode' => 0,
                'RtnMsg' => ['新增紀錄成功']
            ];
        }
        return response()->json($data);
    }
}

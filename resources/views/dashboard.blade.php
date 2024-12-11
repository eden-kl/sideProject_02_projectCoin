@extends('layouts.app')

@section('title', '主畫面')

@section('content')
    <div class="content-wrapper">
        <div class="flex flex-col-reverse md:flex-row">
            <div class="flex flex-1 justify-center">
                <div class="w-96">
                    <canvas id="totalAmount"></canvas>
                </div>
            </div>
            <div class="flex flex-1 flex-col ps-20 py-4 m-4 border rounded-lg border-indigo-500">
                <div class="flex flex-1 items-center justify-center md:justify-normal my-3 md:my-0">
                    <span class="font-bold text-xl xl:text-3xl border-b-2 border-gray-300">&ensp;目標金額&ensp;：@if(isset($goalAmount)) {{$goalAmount->goal}} @endif NTD</span>
                </div>
                <div class="flex flex-1 items-center relative justify-center md:justify-normal my-3 md:my-0">
                    <i class="fa-solid fa-circle absolute -left-10" style="color: rgb(54, 162, 235)"></i>
                    <span class="font-bold text-xl xl:text-3xl border-b-2 border-gray-300">已達成金額：@if(isset($finishAmount)) {{$finishAmount}} @endif NTD</span>
                </div>
                <div class="flex flex-1 items-center relative justify-center md:justify-normal my-3 md:my-0">
                    <i class="fa-solid fa-circle absolute -left-10" style="color: rgb(255, 99, 132)"></i>
                    <span class="font-bold text-xl xl:text-3xl border-b-2 border-gray-300">未達成金額：@if(isset($unFinishAmount)) {{$unFinishAmount}} @endif NTD</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        $(function () {
            const doughnutLabel = {
                beforeDatasetsDraw(chart, args, options) {
                    const {ctx, data} = chart;
                    ctx.save();

                    const xCoor = chart.getDatasetMeta(0).data[0].x;
                    const yCoor = chart.getDatasetMeta(0).data[0].y;

                    ctx.font = 'bold 30px sans-serif';
                    ctx.fillStyle = 'rgb(54, 162, 235)';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText('@if(isset($finishPercentage)) {{$finishPercentage.'%'}} @endif', xCoor, yCoor);
                }
            }
            let totalAmountChart = new Chart($('#totalAmount'), {
                type: 'doughnut',
                data: {
                    labels: [
                        '已達成',
                        '未達成',
                    ],
                    datasets: [{
                        label: '金額',
                        data: [@if(isset($finishAmount)) {{$finishAmount}} @endif, @if(isset($unFinishAmount)) {{$unFinishAmount}} @endif],
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 99, 132)',
                            //'rgb(156, 163, 175)',
                        ],
                        hoverOffset: 4
                    }]
                },
                plugins: [doughnutLabel],
            });
        });
    </script>
@endsection

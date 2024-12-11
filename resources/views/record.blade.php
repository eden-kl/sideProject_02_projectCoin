@extends('layouts.app')

@section('title', '收入紀錄')

@section('content')
    <div class="content-wrapper p-4 flex flex-col">
        <div class="flex flex-col flex-1 justify-between p-4 bg-white border border-gray-200 rounded-lg shadow">
            <!-- body -->
            <div class="flex flex-col flex-1">
                <div class="text-center">
                    <button id="addRecordBtn" class="text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg px-5 py-2.5 focus:outline-none">新增紀錄&ensp;<i class="fa-solid fa-plus"></i></button>
                </div>
                <hr class="w-48 h-1 mx-auto my-2 bg-gray-100 border-0 rounded md:my-4">
                <div class="flex flex-col justify-center flex-1">
                    <div id="recordDiv" class="flex flex-col flex-1 items-center border rounded-lg border-indigo-500 mb-2 overflow-y-scroll max-h-96">
                        @if(isset($data))
                            @foreach($data as $value)
                                <div class="border-b-2 border-gray-300 px-4 py-2.5 my-1 mx-4 flex justify-between w-full md:w-96">
                                    <span>金額：{{$value['target']}}</span>
                                    <span>日期：{{$value['date']}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="border-t-2 border-t-gray-700 py-2.5">
                <span class="float-right">目前總額：@if(isset($totalAmount)) {{$totalAmount.' NTD'}} @endif</span>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="relative z-10 hidden" id="addRecordModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" id="backdrop"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" id="addRecordCard">
                <!-- card -->
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <!-- content -->
                    <!-- header -->
                    <div class="flex itemscenter justify-between p-4 md:p-5 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">
                            新增紀錄
                        </h3>
                        <button type="button" class="cancelBtn text-gray-400 bg-transparent rounded-full hover:bg-gray-200 hover:text-gray-900 text-sm w-8 h-8 ms-auto"><i class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                    <!-- body -->
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="grid gap-4 mb-8 grid-cols-2">
                            <div class="col-span-2">
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 ">金額</label>
                                <input type="number" placeholder="達成金額" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-2">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 ">達成日期</label>
                                <input type="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5">
                            </div>
                        </div>
                        <button type="button" id="addBtn" class="text-white inline-flex items-center bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><i class="fa-solid fa-plus"></i>增加新紀錄</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        $(function () {
            let d = new Date();
            let month = d.getMonth() + 1;
            let day = d.getDate();
            let nowDate = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

            /**
             * 送出資料
             */
            $('#addBtn').on('click', function () {
                let amount = $('#amount').val();
                let date = $('#date').val();
                $.ajax({
                    url:'{{route('record.add')}}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        amount: amount,
                        date: date,
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data){
                        if (data['status']) {
                            closeModal($('#addRecordModal'), $('#addRecordCard'));
                            Swal.fire({
                                title: '新增成功',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            }).then(() => {
                                location.reload();
                            });
                        }else {
                            Swal.fire({
                                title: '新增失敗',
                                html: Object.values(data['RtnMsg']).join('<br>'),
                                icon: 'error'
                            });
                        }
                    },
                    error: function (data) {
                        Swal.fire({
                            title: 'error 錯誤',
                            text: '發生未知錯誤',
                            icon: 'error',
                        });
                    }
                });
            });

            /**
             * 打開modal
             */
            $('#addRecordBtn').on('click', function () {
                openModal($('#addRecordModal'), $('#addRecordCard'));
            });
            /**
             * 關閉modal
             */
            $('#closeBtn').on('click', function () {
                closeModal($('#addRecordModal'), $('#addRecordCard'));
            });

            /**
             * modal動畫前
             */
            $('#addRecordModal').on('animationstart webkitAnimationStart oAnimationStart MSAnimationStart', '#addRecordCard', function (e) {
                let modal = $('#addRecordModal');
                // 關閉modal前
                if ($(this).hasClass('animate-modal-in')) {
                }
                // 開啟modal前
                if ($(this).hasClass('animate-modal-out')) {
                    $('#date').val(nowDate);
                }
            });

            /**
             * modal動畫後
             */
            $('#addRecordModal').on('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', '#addRecordCard', function () {
                let modal = $('#addRecordModal');
                // 關閉modal後
                if ($(this).hasClass('animate-modal-in')) {
                    // 隱藏
                    modal.addClass('hidden');
                    // 清空
                    $('#amount').val('');
                    $('#date').val('');
                }
                // 開啟modal後
                if ($(this).hasClass('animate-modal-out')) {
                }
            });
            /**
             * modal的backdrop點擊關閉
             */
            $(window).on('click', function (event) {
                if ($(event.target).attr('id') === 'addRecordCard') {
                    closeModal($('#addRecordModal'), $('#addRecordCard'));
                }
            });
            /**
             * modal關閉按鈕
             */
            $('#addRecordModal').on('click', '.cancelBtn', function () {
                closeModal($('#addRecordModal'), $('#addRecordCard'));
            });

            /**
             * 關閉modal
             * @param modal
             * @param card
             */
            function closeModal(modal, card) {
                modal.addClass('animate-modal-bg-in');
                modal.removeClass('animate-modal-bg-out');
                card.addClass('animate-modal-in');
                card.removeClass('animate-modal-out');
            }

            /**
             * 開啟modal
             * @param modal
             * @param card
             */
            function openModal(modal, card) {
                modal.addClass('animate-modal-bg-out');
                modal.removeClass('animate-modal-bg-in');
                card.addClass('animate-modal-out');
                card.removeClass('animate-modal-in');
                modal.removeClass('hidden');    // 多一個隱藏modal
            }
        });
    </script>
@endsection

@extends('layouts.app')

@section('title', '登入畫面')
@section('bodyClass', 'login-page')

@section('content')
    <div class="content-wrapper">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 w-11/12 sm:w-[480px]">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">登入你的帳號</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('login.doLogin') }}" method="POST">
                    @csrf
                    <div>
                        <label for="acc" class="block text-sm font-medium leading-6 text-gray-900">帳號<span
                                class="hidden sm:inline"> Account</span></label>
                        <div class="mt-2">
                            <input id="acc" name="acc" type="text" required placeholder="Account"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">密碼<span
                                    class="hidden sm:inline"> Password</span></label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required placeholder="Password"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">登入</button>
                    </div>
                </form>
                <p class="mt-10 text-center text-sm text-gray-500">
                    還不是會員嗎？
                    <a href="{{ route('register.index') }}"
                        class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">點我建立一個會員</a>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        $(function() {
            toastr.info('帳號：test<br>密碼：test1234', '測試帳號', {
                timeOut: 0,
                extendedTimeOut: 0,
                closeButton: true,
            });
        });
    </script>
@endsection
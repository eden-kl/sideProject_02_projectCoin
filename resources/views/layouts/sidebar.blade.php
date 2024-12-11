<aside class="fixed flex flex-col justify-between bg-indigo-500 h-screen w-72 left-0 bottom-0 top-0">
    <div class="sidebar px-4 py-6">
        <div class="flex justify-center">
            <span class="grid h-10 w-32 place-content-center rounded-lg bg-indigo-50 text-xs text-gray-600">
            Project Coin
        </span>
        </div>
        <nav class="mt-6 space-y-1">
            <ul>
                <li>
                    <a class="block rounded-lg hover:bg-indigo-800 px-4 py-2 text-sm font-medium text-white @if(isset($menu_type) && ($menu_type == 'dashboard')) bg-indigo-600 @endif"
                    href="{{route('dashboard.index')}}">
                        <i class="@if(isset($menu_type) && ($menu_type == 'dashboard')) fa-solid @else fa-regular @endif fa-circle mr-2"></i>
                        儀表板
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a class="block rounded-lg hover:bg-indigo-800 px-4 py-2 text-sm font-medium text-white @if(isset($menu_type) && ($menu_type == 'record')) bg-indigo-600 @endif"
                       href="{{route('record.index')}}">
                        <i class="@if(isset($menu_type) && ($menu_type == 'record')) fa-solid @else fa-regular @endif fa-circle mr-2"></i>
                        收入紀錄
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="sticky inset-x-0 bottom-0 border-t border-gray-100 border-e">
        <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50">
            <i class="fa-solid fa-user"></i>
            <div>
                <p>
                    <strong class="block font-medium">@if(isset($name)) {{$name}} @endif @if(isset($acc)) {{$acc}} @endif</strong>
                </p>
            </div>
        </a>
    </div>
</aside>

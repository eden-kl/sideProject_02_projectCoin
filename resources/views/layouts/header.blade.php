<nav class="nav-head fixed ml-72 bg-indigo-300 right-0 left-0 top-0 flex p-3 z-[1036]">
    <!-- Left navbar links -->
    <ul class="m-0 flex">
        <li class="py-2 px-1">
            <a href="#" role="button" id="menuBtn" class="rounded-md px-3 py-1.5 bg-indigo-600 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="ml-auto">
        <li>
            <button type="button" class="rounded-md px-3 py-1.5 bg-red-600 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
            onclick="location.href='{{route('logout.logout')}}'"><i class="fas fa-sign-out-alt"></i>登出</button>
        </li>
    </ul>
</nav>

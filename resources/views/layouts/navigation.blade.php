@php


$sesuser = session('user');

@endphp

<nav class="z-50 relative">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://www.menatwork.com.ro" class="flex items-center">
            <img src="https://www.menatwork.com.ro/wp-content/uploads/2023/10/New-Logo.png" class="h-24" alt="" />
        </a>
        <div class="flex items-center md:order-2">
            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @if (auth()->check())
                <!-- User is authenticated -->
                <img class="w-8 h-8 rounded-full" src="{{ Storage::url(auth()->user()->photo_path) }}" alt="user photo">
                @else
                <!-- User is not authenticated -->
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/logo.svg" alt="user photo">
                @endif

            </button>

            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow  dark:divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">@if (auth()->check())
                        {{ auth()->user()->name }}
                        @else
                        Guest or unauthenticated user
                        @endif</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">@if (auth()->check())
                        {{ auth()->user()->email }}
                        @else
                        Guest or unauthenticated user
                        @endif</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    
                    @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover-bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                        </form>
                    </li>
                    @endauth

                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0">
                <li>
                    <a href="https://www.menatwork.com.ro/" class="block py-2 pl-3 pr-4 text-white  rounded md:bg-transparent -700 md:p-0 " aria-current="page">Home</a>
                </li>
                <li>
                    <a href="https://www.menatwork.com.ro/" class="block py-2 pl-3 pr-4 text-white  rounded md:bg-transparent -700 md:p-0 " aria-current="page">About Us</a>
                </li>
                <li>
                    <a href="https://www.menatwork.com.ro/" class="block py-2 pl-3 pr-4 text-white  rounded md:bg-transparent -700 md:p-0 " aria-current="page">Contact Us</a>
                </li>
                <li>
                    <a href="https://www.menatwork.com.ro/" class="block py-2 pl-3 pr-4 text-white  rounded md:bg-transparent -700 md:p-0 " aria-current="page">Register Now</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
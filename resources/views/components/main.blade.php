<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/img/Layer_1.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    </head>
    <body class="font-Urbanist bg-body overflow-x-hidden">
        <!-- start: Sidebar -->
        <div class="fixed left-0 top-0 w-60 h-full bg-primary p-4 z-50 sidebar-menu transition-transform border-r-2 border-r-gray-300">
            <a href="#" class="ml-4 mt-4 xl:mt-6 flex items-center gap-2">
                <img src="/img/Layer_1.svg" alt="" class="w-[13%] mr-2">
                <span class="text-md font-semibold text-secondary">Prima Grosir</span>
            </a>
            <ul class="mt-6 xl:mt-9">
                @can('admin')
                <li class="mb-1 group {{ request()->is('dashboard') ? 'active' : '' }} flex items-center">
                    <img src="/img/Rectangle 17040.svg" class="-ml-4 hidden group-[.active]:block" alt="">
                    <a href="/dashboard"
                        class="flex items-center {{ request()->is('dashboard') ? 'py-2 ml-2 px-4' : 'py-4 px-4' }} text-black rounded-lg group-[.active]:text-secondary group-[.selected]:bg-secondary group-[.selected]:text-white">
                        <img src="{{ request()->is('dashboard') ? '/img/home.svg' : '/img/Layer_1 (6).svg' }}" alt="" class="mr-4 w-[18px]">
                        <span class="text-sm xl:text-sm font-semibold">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group {{ request()->is('dashboard/product*') ? 'active' : '' }}">
                    <div class="flex items-center">
                        <img src="/img/Rectangle 17040.svg" class="-ml-4 hidden group-[.active]:block" alt="">
                        <a href="/dashboard/product"
                            class="flex items-center {{ request()->is('dashboard/product*') ? 'py-2 ml-2 px-4' : 'py-4 px-4' }} text-black rounded-lg group-[.active]:text-secondary group-[.selected]:bg-secondary group-[.selected]:text-white">
                            <img src="{{ request()->is('dashboard/product*') ? '/img/Layer_1 (7).svg' : '/img/Layer_1 (1).svg' }}" alt="" class="mr-4 w-[18px]">
                            <span class="text-sm xl:text-sm font-semibold text-black">Produk</span>
                        </a>
                    </div>
                    <ul class="pl-7 mt-2">
                        <li class="mb-4">
                            <a href="/dashboard/product/category" class="text-gray-400 text-sm flex items-center before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Kategory</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1 group {{ request()->is('dashboard/supplier*') ? 'active' : '' }} flex items-center">
                    <img src="/img/Rectangle 17040.svg" class="-ml-4 hidden group-[.active]:block" alt="">
                    <a href="/dashboard/supplier"
                        class="flex items-center {{ request()->is('dashboard/supplier*') ? 'py-2 ml-2 px-4' : 'py-4 px-4' }} text-black rounded-lg group-[.active]:text-secondary group-[.selected]:bg-secondary group-[.selected]:text-white">
                        <img src="{{ request()->is('dashboard/supplier*') ? '/img/Layer_1 (8).svg' : '/img/Vector.svg' }}" alt="" class="mr-4 w-[18px]">
                        <span class="text-sm xl:text-sm font-semibold">Supplier</span>
                    </a>
                </li>
                @endcan
                @can('transaction')
                <li class="mb-1 group {{ request()->is('dashboard/transaction*') ? 'active' : '' }}">
                    <div class="flex items-center">
                        <img src="/img/Rectangle 17040.svg" class="-ml-4 hidden group-[.active]:block" alt="">
                        <a href="/dashboard/transaction/create"
                        class="flex items-center {{ request()->is('dashboard/transaction*') ? 'py-2 ml-2 px-4' : 'py-4 px-4' }} text-black rounded-lg group-[.active]:text-secondary group-[.selected]:bg-secondary group-[.selected]:text-white">
                        <img src="{{ request()->is('dashboard/transaction*') ? '/img/Layer_1 (11).svg' : '/img/Layer_1 (2).svg' }}" alt="" class="mr-4 w-[18px]">
                        <span class="text-sm xl:text-sm font-semibold">Transaksi</span>
                        </a>
                    </div>
                    <ul class="pl-7 mt-2">
                        <li class="mb-4">
                            <a href="/dashboard/transaction/history" class="text-gray-400 text-sm flex items-center before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Riwayat</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('admin')
                <li class="mb-1 group {{ request()->is('dashboard/inventory*') ? 'active' : '' }} flex items-center">
                    <img src="/img/Rectangle 17040.svg" class="-ml-4 hidden group-[.active]:block" alt="">
                    <a href="/dashboard/inventory"
                        class="flex items-center {{ request()->is('dashboard/inventory*') ? 'py-2 ml-2 px-4' : 'py-4 px-4' }} text-black rounded-lg group-[.active]:text-secondary group-[.selected]:bg-secondary group-[.selected]:text-white">
                        <img src="{{ request()->is('dashboard/inventory*') ? '/img/Layer_1 (9).svg' : '/img/Layer_1 (3).svg' }}" alt="" class="mr-4 w-[18px]">
                        <span class="text-sm xl:text-sm font-semibold">Inventaris</span>
                    </a>
                </li>
                <li class="mb-1 group {{ request()->is('dashboard/staff*') ? 'active' : '' }} flex items-center">
                    <img src="/img/Rectangle 17040.svg" class="-ml-4 hidden group-[.active]:block" alt="">
                    <a href="/dashboard/staff"
                        class="flex items-center {{ request()->is('dashboard/staff*') ? 'py-2 ml-2 px-4' : 'py-4 px-4' }} text-black rounded-lg group-[.active]:text-secondary group-[.selected]:bg-secondary group-[.selected]:text-white">
                        <img src="{{ request()->is('dashboard/staff*') ? '/img/Layer_1 (10).svg' : '/img/Layer_1 (4).svg' }}" alt="" class="mr-4 w-[18px]">
                        <span class="text-sm xl:text-sm font-semibold">Staff</span>
                    </a>
                </li>
                @endcan
                <li class="mb-1 group">
                    <a href="/logout"
                        class="flex items-center py-4 px-4 text-gray-400 rounded-2xl group-hover:text-black group-[.selected]:text-black">
                        <img src="/img/Layer_1 (5).svg" alt="" class="mr-4 w-[18px]">
                        <span class="text-sm xl:text-sm font-semibold text-black">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 xl:hidden sidebar-overlay"></div>
        <!-- end: Sidebar -->
        {{ $slot }}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
        {{ $alerts ?? '' }}
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
        {{ $dataTable ?? '' }}
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        {{ $script ?? '' }}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.4.1/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
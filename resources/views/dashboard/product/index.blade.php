<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/img/logo (2).svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="font-inter">
    <!-- start: Sidebar -->
    <div class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 sidebar-menu transition-transform">
        <a href="" class="items-center ml-4 flex gap-2">
            <img src="" alt="" class="flex my-6 w-10 h-10 rounded-full">
            <span class="text-lg font-medium text-gray-950">Stellar Hotel</span>
        </a>
        <ul class="mt-4">
            @can('admin')
            <li class="mb-1 group">
                <a href="/dashboard" class="flex items-center py-2 px-4 text-gray-600 rounded-2xl group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-gray-100">
                    <i class="ri-dashboard-line mr-3 text-lg font-semibold group-[.active]:text-sky-600"></i>
                    <span class="text-sm font-semibold">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group active">
                <a href="/dashboard/product" class="flex items-center py-2 px-4 text-gray-600 hover:bg-slate-100 hover:text-sky-500 rounded-2xl hover:font-semibold group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-sky-500">
                    <i class="ri-hotel-bed-line mr-3 text-lg"></i>
                    <span class="text-sm">Produk</span>
                </a>
                <ul class="pl-7 mt-2 group-[.selected]:block">
                    <li class="mb-4">
                        <a href="/dashboard/product/category" class="text-gray-500 text-sm flex items-center hover:text-black before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Kategori</a>
                    </li> 
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/supplier" class="flex items-center py-2 px-4 text-gray-600 hover:bg-slate-100 hover:text-sky-500 rounded-2xl hover:font-semibold group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-sky-500">
                    <i class="ri-list-ordered mr-3 text-lg"></i>
                    <span class="text-sm">Supplier</span>
                </a>
            </li>
            @endcan
            @can('transaction')
            <li class="mb-1 group">
                <a href="/dashboard/transaction/create" class="flex items-center py-2 px-4 text-gray-600 hover:bg-slate-100 hover:text-sky-500 rounded-2xl hover:font-semibold group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-sky-500">
                    <i class="ri-user-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Transaksi</span>
                </a>
                <ul class="pl-7 mt-2 group-[.selected]:block">
                    <li class="mb-4">
                        <a href="/dashboard/transaction/history" class="text-gray-500 text-sm flex items-center hover:text-black before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Riwayat</a>
                    </li> 
                </ul>
            </li>
            @endcan
            @can('admin')
            <li class="mb-1 group">
                <a href="/dashboard/inventory" class="flex items-center py-2 px-4 text-gray-600 hover:bg-slate-100 hover:text-sky-500 rounded-2xl hover:font-semibold group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-sky-500">
                    <i class="ri-user-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Inventaris</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/staff" class="flex items-center py-2 px-4 text-gray-600 hover:bg-slate-100 hover:text-sky-500 rounded-2xl hover:font-semibold group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-sky-500">
                    <i class="ri-user-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Staff</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/" class="flex items-center py-2 px-4 text-gray-600 hover:bg-slate-100 hover:text-sky-500 rounded-2xl hover:font-semibold group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-sky-500">
                    <i class="ri-home-5-line mr-3 text-lg"></i>
                    <span class="text-sm">Home</span>
                </a>
            </li>
            @endcan
            <li class="mb-1 group">
                <form action="/logout" method="post" class="flex items-center py-2 px-4 text-gray-600 hover:bg-slate-100 hover:text-sky-500 rounded-2xl hover:font-semibold group-[.active]:text-gray-900 group-[.selected]:bg-slate-100 group-[.selected]:text-sky-500">
                  <i class="ri-logout-circle-line mr-3 text-lg"></i>
                  @csrf
                  <button type="submit" class="text-sm w-full text-left">logout</button>
                </form>
              </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-100 min-h-screen transition-all main">
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="text-gray-600 mr-2 font-medium">Kamar</li>
            </ul>
            <ul class="ml-auto flex items-center">
                <li class="mr-1 dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                        <i class="ri-search-line"></i>
                    </button>
                    <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                        <form action="" class="p-4 border-b border-b-gray-100">
                            <div class="relative w-full">
                                <input type="text" class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500" placeholder="Search...">
                                <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                        <i class="ri-notification-3-line"></i>
                    </button>
                </li>
                <li class="dropdown ml-3 flex items-center gap-3">
                  
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>  

        <div class="p-6">
            <a href="/dashboard/product/create" class="p-3 bg-sky-500 text-white rounded-md text-sm">Buat produk Baru</a>
            <div class="container-box mt-8">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-200">Id</th>
                            <th class="px-4 py-2 bg-gray-200">Id Produk</th>
                            <th class="px-4 py-2 bg-gray-200">Kategori</th>
                            <th class="px-4 py-2 bg-gray-200">Produk</th>
                            <th class="px-4 py-2 bg-gray-200">Harga</th>
                            <th class="px-4 py-2 bg-gray-200">Stock</th>
                            <th class="px-4 py-2 bg-gray-200">Ubah</th>
                            <th class="px-4 py-2 bg-gray-200">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="bg-gray-100 hover:bg-gray-200">
                           
                            <td class="border px-4 py-2">{{  $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{  $product->id_product }}</td>
                            <td class="border px-4 py-2">{{  $product->category->name_category }}</td>
                            <td class="border px-4 py-2">{{  $product->name_product }}</td>
                            <td class="border px-4 py-2">{{  $product->price }}</td>
                            <td class="border px-4 py-2">{{ $product->stock ?? 0 }}</td>
                            <td class="border px-4 py-2">
                                <a href="/dashboard/product/{{ $product->slug_product }}/edit" class="text-blue-500">Ubah</a>
                            </td>
                            <td class="border px-4 py-2">
                                <form action="/dashboard/product/{{ $product->slug_product }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('yakin?')" class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

  

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
<!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-60 h-full bg-primary p-4 z-50 sidebar-menu transition-transform border-r-2 border-r-gray-300">
    <a href="#" class="ml-4 mt-4 xl:mt-6 flex items-center gap-2">
        <img src="img/Layer_1.svg" alt="" class="w-[13%] mr-2">
        <span class="text-md font-semibold text-secondary">Prima Grosir</span>
    </a>
    <ul class="mt-6 xl:mt-9">
        @can('admin')
        <li class="mb-1 group active flex items-center">
            <img src="img/Rectangle 17040.svg" class="-ml-4 hidden group-[.active]:block" alt="">
            <a href="/dashboard"
                class="flex items-center py-2 ml-2 px-4 text-black rounded-lg group-[.active]:text-secondary group-[.selected]:bg-secondary group-[.selected]:text-white">
                <img src="img/home.svg" alt="" class="mr-4 w-[18px]">
                <span class="text-sm xl:text-sm font-semibold">Dashboard</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="/dashboard/product"
                class="flex items-center py-4 px-4 text-gray-400 rounded-2xl group-hover:text-black group-[.selected]:text-black">
                <img src="img/Layer_1 (1).svg" alt="" class="mr-4 w-[18px]">
                <span class="text-sm xl:text-sm font-semibold text-black">Produk</span>
            </a>
            <ul class="pl-7 mt-2">
                <li class="mb-4">
                    <a href="/dashboard/product/category" class="text-gray-400 text-sm flex items-center before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Kategory</a>
                </li>
            </ul>
        </li>
        <li class="mb-1 group">
            <a href="/dashboard/supplier"
                class="flex items-center py-4 px-4 text-gray-400 rounded-2xl group-hover:text-black group-[.selected]:text-black">
                <img src="img/Vector.svg" alt="" class="mr-4 w-[18px]">
                <span class="text-sm xl:text-sm font-semibold text-black">Supplier</span>
            </a>
        </li>
        @endcan
        @can('transaction')
        <li class="mb-1 group">
            <a href="/dashboard/transaction"
            class="flex items-center py-4 px-4 text-gray-400 rounded-2xl group-hover:text-black group-[.selected]:text-black">
            <img src="img/Layer_1 (2).svg" alt="" class="mr-4 w-[18px]">
            <span class="text-sm xl:text-sm font-semibold text-black">Transaksi</span>
            </a>
            <ul class="pl-7 mt-2">
                <li class="mb-4">
                    <a href="/dashboard/transaction/history" class="text-gray-400 text-sm flex items-center before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Riwayat</a>
                </li>
            </ul>
        </li>
        @endcan
        @can('admin')
        <li class="mb-1 group">
            <a href="/dashboard/inventory"
                class="flex items-center py-4 px-4 text-gray-400 rounded-2xl group-hover:text-black group-[.selected]:text-black">
                <img src="img/Layer_1 (3).svg" alt="" class="mr-4 w-[18px]">
                <span class="text-sm xl:text-sm font-semibold text-black">Iventaris</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="/dashboard/staff"
                class="flex items-center py-4 px-4 text-gray-400 rounded-2xl group-hover:text-black group-[.selected]:text-black">
                <img src="img/Layer_1 (4).svg" alt="" class="mr-4 w-[18px]">
                <span class="text-sm xl:text-sm font-semibold text-black">Staff</span>
            </a>
        </li>
        @endcan
        <li class="mb-1 group">
            <a href="/logout"
                class="flex items-center py-4 px-4 text-gray-400 rounded-2xl group-hover:text-black group-[.selected]:text-black">
                <img src="img/Layer_1 (5).svg" alt="" class="mr-4 w-[18px]">
                <span class="text-sm xl:text-sm font-semibold text-black">Logout</span>
            </a>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 xl:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->
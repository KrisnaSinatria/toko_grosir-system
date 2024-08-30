<x-main>
    <x-slot:title>
        Prima Grosir | Produk-Category
    </x-slot:title>
    <main class="w-full xl:w-[calc(100%-240px)] bg-body xl:ml-60 bg-fourth transition-all main">
        <div class="py-4 px-6 bg-primary flex items-center sticky top-0 left-0 z-30 border-b-2 border-b-gray-300">
            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <div class="ml-4">
                <h1 class="text-xl font-semibold">Kategori Produk</h1>
            </div>
            <ul class="flex items-center gap-5 text-sm ml-auto ">
                <img src="/img/notif.svg" alt="">
                <ul class="ml-4 hidden sm:flex items-center">
                    <div class="relative w-full max-w-md">
                        <input class="w-full xl:w-full pr-4 pl-12 py-2.5 bg-body border-2 border-gray-300 placeholder:text-sm rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"  type="search" placeholder="Pencarian" id="searchTransport" aria-label="Search">
                        <div class="absolute inset-y-0 left-0 flex items-center pr-3 ml-4 cursor-pointer">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </ul>
            </ul>
        </div>
        <div class="p-4 xl:p-6">
            <div class="">
                <div class="bg-primary p-6 xl:px-8 border-2 border-gray-300 rounded-lg">
                    <div class="flex justify-between items-center mb-4 xl:mb-8">
                        <h1 class="font-semibold text-lg">Buat Kategori Produk</h1>
                    </div>
                    <div class="jantuk">
                        <form action="/dashboard/product/category" method="post" class="">
                            @csrf
                            <div class="w-full flex flex-wrap justify-between">
                                <div class="w-[48.5%] mb-5">
                                    <label for="name_category" class="font-semibold text-base mb-4 block">Nama Kategori</label>
                                    <input type="text" name="name_category" id="name_category" value="{{ old('name_category') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="" required />
                                    @error('name_category')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-[48.5%] mb-5">
                                    <label for="slug_category" class="font-semibold text-base mb-4 block">Slug Kategori</label>
                                    <input type="text" name="slug_category" id="slug_category" value="{{ old('slug_category') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" required readonly/>
                                    @error('slug_category')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" name="create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Produk</button>
                            <a href="/dashboard/product/category" class="p-3 text-sm rounded-lg bg-gray-500 text-white font-medium">kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const name = document.querySelector('#name_category');
        const slug = document.querySelector('#slug_category');
    
        name.addEventListener('change', function() {
            fetch(`/dashboard/product/category/checkSlug?name=${name.value}`)
                .then(response => response.json())
                .then(data => slug.value = data.slug_category); 
        });
    </script>
    
</x-main>
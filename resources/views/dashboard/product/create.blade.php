<x-main>
    <x-slot:title>
        Prima Grosir | Produk
    </x-slot:title>
    <main class="w-full xl:w-[calc(100%-240px)] bg-body xl:ml-60 bg-fourth transition-all main">
        <div class="py-4 px-6 bg-primary flex items-center sticky top-0 left-0 z-30 border-b-2 border-b-gray-300">
            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <div class="ml-4">
                <h1 class="text-xl font-semibold">Produk</h1>
            </div>
            <ul class="flex items-center gap-5 text-sm ml-auto">
                <img src="/img/notif.svg" alt="">
                <ul class="ml-4 hidden sm:flex items-center">
                    <div class="relative w-full max-w-md">
                        <input
                            type="text"
                            class="w-full xl:w-full pr-4 pl-12 py-2.5 bg-body border-2 border-gray-300 placeholder:text-sm rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Pencarian">
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
                        <h1 class="font-semibold text-lg">Tambah Produk</h1>
                    </div>
                    <div class="jantuk">
                        <form action="/dashboard/product" method="post" class="">
                            @csrf
                            <div class="w-full flex flex-wrap justify-between">
                                <div class="w-[48.5%] mb-5">
                                    <label for="id_category" class="font-semibold text-base mb-4 block">Nama Kategori</label>
                                    <select name="id_category" id="" value="{{ old('id_category',  ) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_category}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_category')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-[48.5%] mb-5">
                                    <label for="name_product" class="font-semibold text-base mb-4 block">Nama Produk</label>
                                    <input type="text" name="name_product" id="name_product"  value="{{ old('name_product') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Nama" required />
                                    @error('name_product')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-[48.5%] mb-5">
                                    <label for="slug_product" class="font-semibold text-base mb-4 block">Slug Produk</label>
                                    <input type="text" name="slug_product" id="slug_product"  value="{{ old('slug_product') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" required readonly/>
                                    @error('slug_product')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-[48.5%] mb-5">
                                    <label for="price" class="font-semibold text-base mb-4 block">Harga</label>
                                    <div class="flex items-center gap-1 text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]">
                                        <span>Rp.</span>
                                        <input type="integer" name="price" id="price" value="{{ old('price') }}" class="w-full outline-none" required/>
                                        @error('price')
                                            <div class="text-red-500 text-sm">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-[48.5%] mb-5">
                                    <label for="stock" class="font-semibold text-base mb-4 block">Stock</label>
                                    <input type="number" name="stock" id="stock"  value="{{ old('stock') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Stock"/>
                                    @error('stock')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" name="create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat Supplier</button>
                            <a href="/dashboard/product" class="p-3 text-sm rounded-lg bg-gray-500 text-white font-medium">kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
         const name = document.querySelector('#name_product');
        const slug = document.querySelector('#slug_product');
    
        name.addEventListener('change', function() {
            fetch(`/dashboard/product/checkSlug?name=${name.value}`)
                .then(response => response.json())
                .then(data => slug.value = data.slug_product); 
        });
    </script>
</x-main>
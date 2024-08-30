<x-main>
    <x-slot:title>
        Prima Grosir | Supplier
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
                        <form action="/dashboard/supplier" method="post" class="">
                            @csrf
                            <div class="w-full flex flex-wrap justify-between">
                                <div class="w-[48.5%] mb-5">
                                    <label for="name" class="font-semibold text-base mb-4 block">Nama Supplier</label>
                                    <input type="text" name="name" id="name"  value="{{ old('name') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Nama" required />
                                    @error('name')
                                        <div class="text-red-500 text-sm">
                                          {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="w-[48.5%] mb-5">
                                    <label for="address" class="font-semibold text-base mb-4 block">Alamat</label>
                                    <input type="text" name="address" id="address"  value="{{ old('address') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Alamat " required/>
                                    @error('address')
                                        <div class="text-red-500 text-sm">
                                          {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="w-[48.5%] mb-5">
                                    <label for="phone" class="font-semibold text-base mb-4 block">Nomor Telepon</label>
                                    <input type="number" name="phone" id="phone"  value="{{ old('phone') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan No Telp" required/>
                                    @error('phone')
                                        <div class="text-red-500 text-sm">
                                          {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                            </div>
                            <button type="submit" name="create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat Produk</button>
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
    <x-slot:alerts>
        @if (session('loginSuccess'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('loginSuccess') }}',
                    icon: 'success',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif (session('loginError'))
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('loginError') }}',
                    icon: 'success',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif (session('logoutAlert'))
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('logoutAlert') }}',
                    icon: 'error',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @endif
    </x-slot:alerts>

    <x-slot:dataTable>
        <script>
            new DataTable('#example', {
                info: false,
                ordering: false,
                paging: false,
                
            }); 
        </script>
    </x-slot:dataTable>
    
   
</x-main>
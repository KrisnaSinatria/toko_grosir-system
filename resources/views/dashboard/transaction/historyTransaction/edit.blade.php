<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/img/logo (2).svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
            <li class="mb-1 group">
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
            <li class="mb-1 group active">
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
            <h1 class="text-xl font-semibold mb-8">Ubah Transaksi :</h1>
            <form action="/dashboard/transaction/history/{{ $history->id }}" method="post" class="max-w-2xl p-6 bg-white rounded-lg">
                @method('put')
                @csrf
                <div class="">
                    <div id="product-list">
                        @foreach($history->products as $index => $transactionProduct)
                            <div class="flex items-center space-x-4 mb-4 product-entry">
                                <select name="products[{{ $index }}][id]" class="form-control product-select shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled>Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ (old("products.{$index}.id", $transactionProduct->pivot->id_product) == $product->id) ? 'selected' : '' }} data-price="{{ $product->price }}">
                                            {{ $product->name_product }} (Harga: {{ $product->price }})
                                        </option>
                                    @endforeach
                                </select>
                
                                <input type="number" name="products[{{ $index }}][quantity]" value="{{ old("products.{$index}.quantity", $transactionProduct->pivot->quantity) }}" class="form-control product-quantity shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Quantity" min="1" required>
                
                                <button type="button" class="btn-remove">X</button>
                            </div>
                        @endforeach
                    </div>
                   
                    <button type="button" id="add-product" class="btn btn-secondary mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Another Product</button>
                    
                    <div class="mb-5">
                        <label for="total_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Total Belanjaan</label>
                        <input type="text" name="total_amount" id="total_amount" value="{{ old('total_amount', $history->total_amount) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" readonly>
                    </div>
                    
                    <div class="mb-5">
                        <label for="paid_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pembayaran</label>
                        <input type="text" name="paid_amount" id="paid_amount" value="{{ old('paid_amount', $history->paid_amount) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="" required />
                        @error('paid_amount')
                            <div class="text-red-500 text-sm">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="change_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Kembalian</label>
                        <input type="text" name="change_amount" id="change_amount" value="{{ old('change_amount', $history->change_amount) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required readonly />
                        @error('change_amount')
                            <div class="text-red-500 text-sm">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <a href="/dashboard/transaction/history" class="p-3 text-sm rounded-lg bg-gray-500 text-white font-medium">Kembali</a>
            </form>
        </div>  
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.product-select').select2();
        });
    
        document.addEventListener('DOMContentLoaded', function () {
    let productCount = document.querySelectorAll('.product-entry').length;

    // Initial calculation
    calculateTotal();

    document.getElementById('add-product').addEventListener('click', function () {
        const productEntry = document.createElement('div');
        productEntry.classList.add('flex', 'items-center', 'space-x-4', 'mb-4', 'product-entry');

        const productSelect = document.createElement('select');
        productSelect.name = `products[${productCount}][id]`;
        productSelect.classList.add('form-control', 'product-select', 'shadow-sm', 'bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'p-2.5', 'dark:bg-gray-100', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-black', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500');
        productSelect.innerHTML = `<option value="" selected disabled>Select Product</option>`;
        @foreach($products as $product)
            productSelect.innerHTML += `<option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                            {{ $product->name_product }} (Harga: {{ $product->price }})
                                        </option>`;
        @endforeach

        const quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.name = `products[${productCount}][quantity]`;
        quantityInput.classList.add('form-control', 'product-quantity', 'shadow-sm', 'bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'p-2.5', 'dark:bg-gray-100', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-black', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500');
        quantityInput.placeholder = 'Quantity';
        quantityInput.min = 1;
        quantityInput.required = true;

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.innerHTML = 'X';
        removeButton.classList.add('btn-remove');
        removeButton.addEventListener('click', function () {
            productEntry.remove();
            calculateTotal(); 
        });

        productEntry.appendChild(productSelect);
        productEntry.appendChild(quantityInput);
        productEntry.appendChild(removeButton);

        document.getElementById('product-list').appendChild(productEntry);
        productCount++;

        // Apply Select2 to new select element
        $(productSelect).select2();

        // Add event listeners to new elements
        productSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
    });

    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        const quantityInputs = document.querySelectorAll('.product-quantity');
        let isValid = true;

        quantityInputs.forEach(function (input) {
            if (!input.value.trim()) {
                input.classList.add('border-red-500'); 
                isValid = false;
            } else {
                input.classList.remove('border-red-500');
            }
        });

        if (!isValid) {
            event.preventDefault(); 
        }
    });

    function calculateTotal() {
        let totalAmount = 0;
        const productEntries = document.querySelectorAll('.product-entry');

        productEntries.forEach(function (entry) {
            const productSelect = entry.querySelector('.product-select');
            const quantityInput = entry.querySelector('.product-quantity');
            const price = productSelect.options[productSelect.selectedIndex]?.getAttribute('data-price') || 0;
            const quantity = quantityInput.value || 0;

            totalAmount += price * quantity;
        });

        document.getElementById('total_amount').value = totalAmount;
    }

    // Initial event listeners for the first product entries
    document.querySelectorAll('.product-select').forEach(function (select) {
        select.addEventListener('change', calculateTotal);
    });

    document.querySelectorAll('.product-quantity').forEach(function (input) {
        input.addEventListener('input', calculateTotal);
    });

    // Apply Select2 to initial product selects
    $('.product-select').select2();
    
    // Initial calculation on page load
    calculateTotal();

    // Handle removing old products
    document.querySelectorAll('.btn-remove').forEach(function (button) {
        button.addEventListener('click', function () {
            const productEntry = button.closest('.product-entry');
            productEntry.remove();
            calculateTotal();
        });
    });
});



    </script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
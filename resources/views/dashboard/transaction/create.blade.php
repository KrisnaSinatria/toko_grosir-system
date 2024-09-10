<x-main>
    <x-slot:title>
        Prima Grosir | Transaksi
    </x-slot:title>
    <main class="w-full xl:w-[calc(100%-240px)] bg-body xl:ml-60 bg-fourth transition-all main">
        <div class="py-4 px-6 bg-primary flex items-center sticky top-0 left-0 z-30 border-b-2 border-b-gray-300">
            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <div class="ml-4">
                <h1 class="text-xl font-semibold">Transaksi</h1>
            </div>
            <ul class="flex items-center gap-5 text-sm ml-auto">
                <img src="/img/notif.svg" alt="">
                <ul class="ml-4 hidden sm:flex items-center">
                    <div class="relative w-full max-w-md">
                        <input
                            type="text"
                            class="w-full xl:w-full pr-4 pl-12 py-2.5 bg-body border-2 border-gray-300 placeholder:text-sm rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Pencarian"
                        >
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
            <form action="/dashboard/transaction" method="post" class="">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
                    <div class="grid lg:col-span-3 bg-primary border-2 border-gray-300 rounded-md p-4 xl:p-6 shadow-md shadow-black/5">
                        <div class="flex flex-col gap-4">
                            <div class="flex justify-between items-start">
                                <h1 class="font-semibold text-lg">Produk</h1>
                                <button type="button" id="add-product" class="btn btn-secondary font-medium text-sm bg-secondary rounded-sm text-white px-4 py-2.5">Tambah Produk</button>
                            </div>
                            <div class="space-y-6 relative jantuk mb-2">
                                <div id="product-list">
                                    <div class="flex items-center justify-between space-x-4 mb-4 product-entry">
                                        <select name="products[0][id]" class="form-control product-select bg-body border-2 font-medium border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full  py-3">
                                            <option value="" selected disabled>Select Product</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                    {{ $product->name_product }} (Harga: {{ $product->price }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="max-w-sm mx-auto">
                                            <div class="relative flex items-center w-36">
                                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-body hover:bg-gray-200 border-2 border-gray-300 rounded-s-md p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                                    <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="number" value="0" name="products[0][quantity]" id="" data-input-counter aria-describedby="helper-text-explanation" class="form-control product-quantity bg-body border-2 border-x-0 border-gray-300 h-11 text-center placeholder:text-gray-900 placeholder:font-medium text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2 pl-3" placeholder="0" required />
                                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-body hover:bg-gray-200 border-2 border-gray-300 rounded-e-md p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                                    <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        {{-- <input type="number" name="products[0][quantity]" class="form-control product-quantity shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Quantity" min="1" required> --}}
                                        <button type="button" class="btn-remove"><img src="/img/kotak batal.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid lg:col-span-2 bg-primary border-2 border-gray-300 text-black rounded-md p-4 xl:p-6 shadow-md shadow-black/5">
                        <div class="mb-4">
                            <div class="mb-5 xl:mb-8">
                                <div class="">
                                    <h3 class="text-lg font-semibold mt-1 mb-6">Transaksi</h3>
                                </div>
                                <div class="border-b-2 border-b-gray-300 border-dashed"></div>
                            </div>
                            <div class="lg:flex lg:items-center gap-2 lg:justify-between mb-4">
                                <div class="mb-5">
                                    <label for="total_amount" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-black">Total Belanjaan</label>
                                    <div class="flex items-center gap-1 text-sm p-2 py-3 w-full bg-body border-2 border-gray-300 font-semibold">
                                        <span>Rp.</span>
                                        <input type="text" name="total_amount" id="total_amount" value="0" class="w-full outline-none bg-body" readonly>
                                        @error('price')
                                            <div class="text-red-500 text-sm">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="paid_amount" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-black">Pembayaran</label>
                                    <div class="flex items-center gap-1 text-sm p-2 py-3 w-full bg-body border-2 border-gray-300 font-semibold">
                                        <span>Rp.</span>
                                        <input type="number" name="paid_amount" id="paid_amount" value="{{ old('paid_amount') }}" class="w-full outline-none bg-body" placeholder="" required />
                                        @error('paid_amount')
                                            <div class="text-red-500 text-sm">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @error('paid_amount')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="change_amount" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-black">Kembalian</label>
                                <div class="flex items-center gap-1 text-sm p-2 py-3 w-full bg-body border-2 border-gray-300 font-semibold">
                                    <span>Rp.</span>
                                    <input type="number" name="change_amount" id="change_amount" value="{{ $changeAmount }}" class="w-full outline-none bg-body" placeholder="" required readonly />
                                    @error('paid_amount')
                                        <div class="text-red-500 text-sm">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                @error('change_amount')
                                    <div class="text-red-500 text-sm">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="border-b-2 border-b-gray-300 border-dashed"></div>
                            <div class="w-full flex items-center gap-3 mt-10">
                                <button type="submit" class="py-3 px-3 w-[50%] bg-secondary text-center rounded-sm text-primary">Selesaikan</button>
                                <a href="" class="py-3 px-3 w-[50%] bg-body text-center rounded-sm border border-gray-300 text-black">Batalkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    
    <x-slot:alerts>
        @if (session('Transactionsuccess'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('Transactionsuccess') }}',
                    icon: 'success',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif (session('errorAmount'))
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('errorAmount') }}',
                    icon: 'error',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif (session('errorTransaction'))
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('errorTransaction') }}',
                    icon: 'error',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif  (session('loginSuccess'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('loginSuccess') }}',
                icon: 'success',
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
    
    <x-slot:script>
        <script>
        $(document).ready(function() {
            $('.product-select').select2();
        });

        
        document.addEventListener('DOMContentLoaded', function () {
        let productCount = document.querySelectorAll('.product-entry').length;

        document.getElementById('add-product').addEventListener('click', function () {
            const productEntry = document.createElement('div');
            productEntry.classList.add('flex', 'items-center', 'justify-between', 'space-x-4', 'mb-4', 'product-entry');

            const productSelect = document.createElement('select');
            productSelect.name = `products[${productCount}][id]`;
            productSelect.classList.add('form-control', 'product-select', 'bg-body', 'border-2', 'font-medium', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-md', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-2.5', 'py-3');
            productSelect.innerHTML = `<option value="" selected disabled>Select Product</option>`;
            @foreach($products as $product)
            productSelect.innerHTML += `<option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                            {{ $product->name_product }} (Harga: {{ $product->price }})
                                        </option>`;
            @endforeach

            const containerDiv = document.createElement('div');
        containerDiv.classList.add('max-w-sm', 'mx-auto');

        const flexDiv = document.createElement('div');
        flexDiv.classList.add('relative', 'flex', 'items-center', 'w-36');
        containerDiv.appendChild(flexDiv);

        const decrementButton = document.createElement('button');
        decrementButton.type = 'button';
        decrementButton.id = 'decrement-button';
        decrementButton.setAttribute('data-input-counter-decrement', 'quantity-input');
        decrementButton.classList.add('bg-body', 'hover:bg-gray-200', 'border-2', 'border-gray-300', 'rounded-s-md', 'p-3', 'h-11', 'focus:ring-gray-100', 'focus:ring-2', 'focus:outline-none');

        const decrementIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        decrementIcon.classList.add('w-3', 'h-3', 'text-gray-900');
        decrementIcon.setAttribute('aria-hidden', 'true');
        decrementIcon.setAttribute('fill', 'none');
        decrementIcon.setAttribute('viewBox', '0 0 18 2');

        const decrementPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        decrementPath.setAttribute('stroke', 'currentColor');
        decrementPath.setAttribute('stroke-linecap', 'round');
        decrementPath.setAttribute('stroke-linejoin', 'round');
        decrementPath.setAttribute('stroke-width', '2');
        decrementPath.setAttribute('d', 'M1 1h16');

        decrementIcon.appendChild(decrementPath);
        decrementButton.appendChild(decrementIcon);
        flexDiv.appendChild(decrementButton);

        const quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.name = `products[${productCount}][quantity]`;
        quantityInput.id = 'quantity-input';
        quantityInput.setAttribute('data-input-counter', '');
        quantityInput.setAttribute('aria-describedby', 'helper-text-explanation');
        quantityInput.classList.add('form-control', 'product-quantity', 'bg-body', 'border-2', 'border-x-0', 'border-gray-300', 'h-11', 'text-center', 'placeholder:text-gray-900', 'placeholder:font-medium', 'text-gray-900', 'text-sm', 'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'py-2', 'pl-3');
        quantityInput.placeholder = '0';
        quantityInput.required = true;
        flexDiv.appendChild(quantityInput);

        const incrementButton = document.createElement('button');
        incrementButton.type = 'button';
        incrementButton.id = 'increment-button';
        incrementButton.setAttribute('data-input-counter-increment', 'quantity-input');
        incrementButton.classList.add('bg-body', 'hover:bg-gray-200', 'border-2', 'border-gray-300', 'rounded-e-md', 'p-3', 'h-11', 'focus:ring-gray-100', 'focus:ring-2', 'focus:outline-none');

        const incrementIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        incrementIcon.classList.add('w-3', 'h-3', 'text-gray-900');
        incrementIcon.setAttribute('aria-hidden', 'true');
        incrementIcon.setAttribute('fill', 'none');
        incrementIcon.setAttribute('viewBox', '0 0 18 18');

        const incrementPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        incrementPath.setAttribute('stroke', 'currentColor');
        incrementPath.setAttribute('stroke-linecap', 'round');
        incrementPath.setAttribute('stroke-linejoin', 'round');
        incrementPath.setAttribute('stroke-width', '2');
        incrementPath.setAttribute('d', 'M9 1v16M1 9h16');

        incrementIcon.appendChild(incrementPath);
        incrementButton.appendChild(incrementIcon);
        flexDiv.appendChild(incrementButton);
        
        const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.innerHTML = '<img src="/img/kotak batal.svg" alt="">';
                removeButton.classList.add('btn-remove');
                removeButton.addEventListener('click', function () {
                    productEntry.remove();
                    calculateTotal();
                });                                    

        productEntry.appendChild(productSelect);
        productEntry.appendChild(containerDiv);
        productEntry.appendChild(removeButton);

        document.getElementById('product-list').appendChild(productEntry);
        productCount++;

            productSelect.addEventListener('change', calculateTotal);
            quantityInput.addEventListener('input', calculateTotal);

            document.getElementById('product-list').appendChild(productEntry);
            productCount++;

            $('.product-select').select2();
        });

        document.addEventListener('click', function(event) {
        if (event.target.closest('#increment-button')) {
            let inputField = event.target.closest('#increment-button').previousElementSibling;
            if (inputField && inputField.type === 'number') {
                let currentValue = parseInt(inputField.value, 10) || 0;
                inputField.value = currentValue + 1;
                calculateTotal();
            }
        }

        if (event.target.closest('#decrement-button')) {
            let inputField = event.target.closest('#decrement-button').nextElementSibling;
            if (inputField && inputField.type === 'number') {
                let currentValue = parseInt(inputField.value, 10) || 1;
                inputField.value = currentValue > 1 ? currentValue - 1 : 0;
                calculateTotal();
            }
        }
    });


        function calculateTotal() {
            let totalAmount = 0;
            const productEntries = document.querySelectorAll('.product-entry');

            productEntries.forEach(function (entry) {
                const productSelect = entry.querySelector('.product-select');
                const quantityInput = entry.querySelector('.product-quantity');
                const price = productSelect.options[productSelect.selectedIndex]?.getAttribute('data-price') || 0;
                const quantity = parseInt(quantityInput.value, 10) || 0;

                totalAmount += price * quantity;
            });

            document.getElementById('total_amount').value = totalAmount;
        }

        document.querySelectorAll('.product-select').forEach(function(selectElement) {
            selectElement.addEventListener('change', calculateTotal);
        });
        document.querySelectorAll('.product-quantity').forEach(function(inputElement) {
            inputElement.addEventListener('input', calculateTotal);
        });
        calculateTotal();
        });

        </script>
    </x-slot:script>
    
   
</x-main>
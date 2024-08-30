<x-main>
    <x-slot:title>
        Prima Grosir | Staff
    </x-slot:title>
    <main class="w-full xl:w-[calc(100%-240px)] bg-body xl:ml-60 bg-fourth transition-all main">
        <div class="py-4 px-6 bg-primary flex items-center sticky top-0 left-0 z-30 border-b-2 border-b-gray-300">
            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <div class="ml-4">
                <h1 class="text-xl font-semibold">Staff</h1>
            </div>
            <ul class="flex items-center gap-5 text-sm ml-auto">
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
                <div class="bg-primary p-4 xl:px-6 border-2 border-gray-300 rounded-lg">
                    <div class="flex justify-between mt-4 xl:mt-6 items-center mb-1 xl:mb-2">
                        <h1 class="font-semibold text-lg">Data Staff</h1>
                        <a href="/dashboard/staff/create" class="font-medium text-sm tracking-wide bg-secondary rounded-sm text-white px-4 py-2.5">Buat Staff Baru</a>
                    </div>
                    <div class="jantuk">
                        <table id="example" data-ordering="false" class="table-auto w-full mx-6 md:mx-auto justify-center text-left mt-6">
                            <thead class="border-b-2 border-gray-300">
                                <tr class="justify-between">
                                    <th class="font-semibold pr-6 py-3 text-[16px]"><p class="text-left">No</p></th>
                                    <th class="font-semibold pr-6 py-3 text-[16px]"><p class="text-left">Nama Staff</p></th>
                                    <th class="font-semibold pr-6 py-3 text-[16px]"><p class="text-left">Telepon</p></th>
                                    <th class="font-semibold pr-6 py-3 text-[16px]"><p class="text-left">Alamat</p></th>
                                    <th class="font-semibold py-3 text-[16px]"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                <tr class="justify-between text-left">
                                    <td class="pr-6 py-3 text-[16px]"><p class="text-left">{{  $loop->iteration }}</p></td>
                                    <td class="pr-6 py-3 text-[16px]"><p class="text-left">{{  $staff->username }}</p></td>
                                    <td class="pr-6 py-3 text-[16px]"><p class="text-left">{{  $staff->phone }}</p></td>
                                    <td class="pr-6 py-3 text-[16px]"><p class="text-left">{{  $staff->address }}</p></td>
                                    <td class="py-3 text-[16px] flex gap-2 w-10 md:w-auto items-start">
                                        <a href="/dashboard/staff/{{ $staff->id }}/edit" class="text-blue-500">
                                            <img src="/img/kotak lihat.svg" alt="">
                                        </a>
                                        <form id="delete-form-{{ $staff->id }}" action="/dashboard/staff/{{ $staff->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="button" onclick="confirmDelete('{{ $staff->id }}')" class="w-full">
                                                <img src="/img/kotak hapus.svg" alt="">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-slot:alerts>
        @if (session('createStaff'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('createStaff') }}',
                    icon: 'success',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif (session('updateStaff'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('updateStaff') }}',
                    icon: 'success',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif (session('deleteStaff'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('deleteStaff') }}',
                    icon: 'success',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @elseif (session('deleteStaff'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('deleteStaff') }}',
                    icon: 'success',
                    confirmButtonText: 'Kembali'
                });
            </script>
        @endif
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
    </x-slot:alerts>
    <x-slot:dataTable>
        <script>
            new DataTable('#example', {
                info: false,
                ordering: false,
                paging: false,
            }); 
            
            oTable = $('#example').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
            $('#searchTransport').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
            oTable = $('#example').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
            $('#searchTransport2').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        </script>
    </x-slot:dataTable>
</x-main>
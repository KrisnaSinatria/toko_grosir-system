<x-main>
    <x-slot:title>
       Prima Grosir | Dashboard
    </x-slot:title>
    <main class="w-full xl:w-[calc(100%-240px)] bg-body xl:ml-60 bg-fourth transition-all main">
        <div class="py-4 px-6 bg-primary flex items-center sticky top-0 left-0 z-30 border-b-2 border-b-gray-300">
            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <div class="ml-4">
                <h1 class="text-xl font-semibold">Dashboard</h1>
            </div>
            <ul class="flex items-center gap-1 sm:gap-5 text-sm ml-auto">
                <img src="img/notif.svg" alt="">
                <ul class="ml-4 items-center hidden sm:flex">
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
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-6">
                <div class="bg-primary rounded-lg border-2 border-gray-300 px-4 py-5 xl:px-6 xl:py-6">
                    <div class="flex gap-4">
                        <img src="img/dashboard1.svg" alt="" class="">
                        <div class="flex flex-col justify-between w-full">
                            <p class="font-medium mb-2 xl:mb-1 text-xs text-gray-400">Jumlah Transaksi</p>
                            <div class="">
                                <h1 class="font-bold text-xl">{{ $transaction }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-primary rounded-lg border-2 border-gray-300 px-4 py-5 xl:px-6 xl:py-6">
                    <div class="flex gap-4">
                        <img src="img/dashboard2.svg" alt="" class="">
                        <div class="flex flex-col justify-between w-full">
                            <p class="font-medium mb-2 xl:mb-1 text-xs text-gray-400">Jumlah Produk</p>
                            <div class="">
                                <h1 class="font-bold text-xl">{{ $product }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-primary rounded-lg border-2 border-gray-300 px-4 py-5 xl:px-6 xl:py-6">
                    <div class="flex gap-4">
                        <img src="img/dashboard3.svg" alt="" class="">
                        <div class="flex flex-col justify-between w-full">
                            <p class="font-medium mb-2 xl:mb-1 text-xs text-gray-400">Profit Kotor</p>
                            <div class="">
                                <h1 class="font-bold text-xl">Rp.{{ number_format($totalAmount, 0, ',', '.') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="w-full flex flex-col gap-4">
                    <div class="flex flex-col bg-primary p-4 xl:p-6 rounded-lg border-2 border-gray-300">
                        <div class="flex justify-between items-center">
                            <h1 class="pl-3 text-xl font-semibold">Pendapatan</h1>
                            <div class="pr-3">
                                <form class="">
                                    <select id="chartSelect" class="bg-body border border-gray-300 text-sm rounded-sm w-full p-1.5 px-2">
                                        <option selected value="week">Hari/minggu</option>
                                        <option  value="month">Bulan/tahun</option>
                                    {{-- <option>Tahunan</option> --}}
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="">
                            <div class="sm:mt-2 min-w-full xl:mx-auto xl:justify-center h-72 xl:h-80">
                                <div id="withdrawnMonth" class="max-w-full xl:mx-auto xl:justify-center">
                                </div>
                                <div id="withdrawnWeek" class="max-w-full xl:mx-auto xl:justify-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
   
    <x-slot:script>
        <script>
            window.Apex = {
                chart: {
                    foreColor: '#000',
                    toolbar: {
                    show: false
                    },
                },
                stroke: {
                    width: 3
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    borderColor: "rgba(255, 255, 255, 0.2)"
                    
                }
            };



            var optionsBar = {
                chart: {
                    height: '100%',
                    type: 'bar',
                    
                },
                yaxis: {
                    labels: {
                    style: {
                        fontSize: '12px', 
                        fontFamily: 'Urbanist',
                        fontWeight: 400
                    },
                    },
                  
                    tickAmount: 5,
                },
                plotOptions: {
                    bar: {
                    columnWidth: '50%',
                    horizontal: false,
                    endingShape: 'rounded',
                    borderRadius: 10,
                    borderRadiusApplication: 'end',
                    colors: {
                        backgroundBarColors: ['#C7ECFF', '#C7ECFF'], 
                        backgroundBarOpacity: 1,
                    },
                    },
                },
                tooltip: {
                y: {
                    formatter: function (val) {
                    return "Rp. " + val+",00" 
                    }
                }
                },
                series: [{
                    name: 'Pendapatan',
                    data:  @json($finalData) 
                }, ],
                stroke: {
                    show: false,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',],
                    labels: {
                    style: {
                        colors: '#000'
                    }
                    }
                },
                fill: {
                    opacity: 1
                },
                
                colors: ['#10AEFF'], 
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'right',
                
                }
            }

            var chartBar = new ApexCharts(
            document.querySelector("#withdrawnWeek"),
            optionsBar
            );

            chartBar.render();



            var optionsBar = {
                chart: {
                    height: '100%',
                    type: 'bar',
                    
                },
                yaxis: {
                    labels: {
                    style: {
                        fontSize: '12px', 
                        fontFamily: 'Urbanist',
                        fontWeight: 400
                    },
                    },
                    // min: 0, 
                    // max: 1000, 
                    tickAmount: 5,
                },
                plotOptions: {
                    bar: {
                    columnWidth: '50%',
                    horizontal: false,
                        endingShape: 'rounded',
                        borderRadius: 10,
                        borderRadiusApplication: 'end',
                        colors: {
                        backgroundBarColors: ['#C7ECFF', '#C7ECFF'], 
                        backgroundBarOpacity: 1,
                    },
                    },
                },
                tooltip: {
                y: {
                    formatter: function (val) {
                    return "Rp. " + val+",00" 
                    }
                }
                },
                series: [{
                    name: 'Pendapatan',
                    data: @json($finalDataMonth),

                }, ],
                stroke: {
                    show: false,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des',],
                    labels: {
                    style: {
                        colors: '#000'
                    }
                    }
                },
                fill: {
                    opacity: 1
                },
                
                colors: ['#10AEFF'], 
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'right',
                    
                }
            }

            var chartBar = new ApexCharts(
            document.querySelector("#withdrawnMonth"),
            optionsBar
            );

            chartBar.render();




            document.addEventListener('DOMContentLoaded', function () {
                var chartSelect = document.getElementById('chartSelect');
                var week = document.getElementById('withdrawnWeek');
                var month = document.getElementById('withdrawnMonth');
        
                function toggleDivs() {
                    var selectedChart = chartSelect.value;
                    if (selectedChart == 'week') {
                        week.style.display = 'block';
                        month.style.display = 'none';
                    } else{
                        week.style.display = 'none';
                        month.style.display = 'block';
                    }
                }
                chartSelect.addEventListener('change', toggleDivs);
                toggleDivs();
            });
        </script>
        
    </x-slot:script>

    
</x-main>
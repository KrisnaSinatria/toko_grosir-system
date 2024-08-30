<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="overflow-x-hidden flex items-center h-screen text-black">
    <div class="w-[90%] mx-auto flex justify-center items-center">
        <div class="w-4/5 flex flex-col gap-4 md:w-1/2 bg-slate-200 p-4">
            <div class="flex flex-col gap-3 sm:gap-5">
              <img src="/img/logo_hotel.svg" alt="" class="w-[10%]">
              <div class="xl:mt-1">
                <h1 class="font-bold text-sm sm:text-2xl md:text-lg xl:text-2xl">Selamat Datang Kembali!</h1>
                <p class="mt-2 font-medium opacity-65 text-xs sm:text-sm md:text-xs xl:text-base xl:mt-3">Masuklah atau masukan akun Anda</p>
              </div>
            </div>
            <div class="flex flex-col gap-2">
              <form action="" method="post">
                 @csrf
                <div class="flex flex-col gap-3 sm:gap-4 py-2">
                    <div class="">
                      <input class="font-medium bg-white rounded-md p-2 sm:p-3 md:p-2 lg:p-2.5 outline-none w-full text-xs sm:text-sm md:text-[13px]" type="text" name="email" id="email" placeholder="Masukkan E-Mail" title="email" autocomplete="off"  required value="{{ old('email') }}">
                      @error('email')
                      <div class="mt-2">
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                      </div>
                      @enderror
                    </div>  
                    <div class="">
                        <input class="font-medium bg-white rounded-md p-2 sm:p-3 md:p-2 lg:p-2.5 outline-none w-full text-xs sm:text-sm md:text-[13px]" type="password" name="password" id="password" placeholder="Masukkan Pasword" title="Password" required>
                        @error('password')
                        <div class="mt-2 text-red-500 text-sm">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 flex flex-col items-center gap-2 sm:mt-7">
                  <button type="submit" name="login" class="bg-secondary w-full rounded-md py-2.5 sm:mb-2">
                    <h1 class="text-center text-white text-sm font-semibold sm:text-base md:text-sm">Daftar</h1>
                  </button>
                  </div>
              </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>

    @if (session('loginError'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('loginError') }}',
            icon: 'error',
            confirmButtonText: 'Kembali'
        });
    </script>
    @elseif (session('logoutAlert'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('logoutAlert') }}',
                icon: 'success',
                confirmButtonText: 'Kembali'
            });
        </script>
    @endif    
</html>
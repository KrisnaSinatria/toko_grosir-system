<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="overflow-x-hidden flex items-center h-screen bg-body text-white">
    <div class="w-[85%] mx-auto flex justify-center items-center md:justify-between">
        <div class="hidden w-[42%] md:block">
            <img src="/img/login_hotel.svg" alt="" class="">
        </div>
        <div class="w-4/5 flex flex-col gap-4 md:w-1/2">
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
                <div class="flex flex-col gap-3 sm:gap-5 lg:gap-6">
                    <div class="font-medium bg-secondary rounded-md p-2 sm:p-3 md:p-2 lg:p-3">
                        <input class="bg-secondary outline-none w-full text-xs sm:text-sm md:text-xs lg:text-sm" type="text" name="email" id="email" placeholder="Masukkan E-Mail" title="email" autocomplete="off"  required value="{{ old('email') }}">
                        @error('email')
                    <div class="">
                      <p class="">{{ $message }}</p>
                    </div>
                    @enderror
                      </div>  
                    <div class="font-medium bg-secondary rounded-md p-2 sm:p-3 md:p-2 lg:p-3">
                        <input class="bg-secondary outline-none w-full text-xs sm:text-sm md:text-xs lg:text-sm" type="password" name="password" id="password" placeholder="Masukkan Pasword" title="Password" required>
                        @error('password')
                        <div class="">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 flex flex-col items-center gap-2 sm:mt-7">
                  <button type="submit" name="login" class="bg-primary w-full rounded-md p-3 sm:mb-2">
                    <h1 class="text-center text-sm font-semibold sm:text-base md:text-sm">Daftar</h1>
                  </button>
                  <a href="signUp" class="font-medium text-[10px] opacity-65 sm:text-[13px]">Belum Mempunyai Akun? <span class="font-semibold text-primary opacity-100">Buat Akun</span></a>
                </div>
              </form>
            </div>
        </div>
    </div>
  </body>
</html>
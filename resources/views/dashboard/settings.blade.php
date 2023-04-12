<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Pengaturan</title>

    <style>
        [x-cloak] {
            display: none
        }
    </style>
</head>

<body x-data="{ sidebar_open: false }" class="relative">
    @include('partials.dashboard_sidebarmenu')
    <section class="flex gap-3 px-2 ">
        <div class="basis-[20%] shadow-lg lg:block hidden h-screen">
            @include('partials.dashboard_menu')
        </div>
        <div class="lg:basis-[80%] ">
            <div class="w-full rounded-lg mt-4 shadow-lg p-5">
                <button x-on:click="sidebar_open=true" class="lg:hidden ">
                    <svg class="text-green-500" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                        fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
                <h1 class="font-bold text-2xl text-green-500 lg:block hidden">
                    DIGITAL LIBRARY STIT ASSUNNIYYAH TAMBARANGAN
                </h1>
            </div>
            <div class="rounded-lg mt-4 shadow-lg lg:p-5 p-3 lg:w-full w-screen">
                <h1 class="font-bold text-2xl text-green-500">
                    PENGATURAN
                </h1>
                <hr class="my-2">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-error mt-3">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $error }}</span>
                            </div>
                        </div>
                    @endforeach

                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success mt-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('message') }}</span>
                        </div>
                    </div>
                @endif
                <form action="" method="POST" autocapitalize="off">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Judul Website</span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="title" value="{{ $settings->title }}" />
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Buka Submission</span>
                        </label>
                        <select class="select select-bordered" name="allow_to_submit">
                            <option value="1" @if ($settings->allow_to_submit == 1) selected @endif>Ya
                            </option>
                            <option value="0" @if ($settings->allow_to_submit == 0) selected @endif>Tidak
                            </option>
                        </select>
                    </div>
                    <div class="form-control w-full mt-3">
                        <button type="submit"
                            class="btn bg-green-500 hover:bg-green-700 border-none lg:w-fit w-full">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>

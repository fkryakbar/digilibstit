<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dashboard</title>

    <style>
        [x-cloak] {
            display: none
        }
    </style>
</head>

<body x-data="{ sidebar_open: false }" class="relative">
    @include('partials.dashboard_sidebarmenu')
    <section class="flex gap-3 px-2 ">
        <div class="basis-[20%] shadow-lg lg:block hidden">
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
            <div class="rounded-lg mt-4 shadow-lg lg:p-5 p-3 w-full">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li>Tambah Koleksi</li>
                    </ul>
                </div>
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl text-green-500">
                        TAMBAH BARU
                    </h1>
                </div>
                <hr class="my-2">
                @if (session()->has('message'))
                    <div class="alert alert-success my-3">
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
                <form action="" method="POST" class="mt-3" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Akses <span class="text-red-600">*</span></span>
                        </label>
                        <select class="select select-bordered" name="visibility">
                            <option value="pending" @if (old('visibility') == 'pending') selected @endif>Pending
                            </option>
                            <option value="public" @if (old('visibility') == 'public') selected @endif>Public
                            </option>
                            <option value="restricted" @if (old('visibility') == 'restricted') selected @endif>Restricted
                            </option>
                        </select>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Judul <span class="text-red-600">*</span></span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="title" value="{{ old('title') }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Penulis <span class="text-red-600">*</span></span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="writer" value="{{ old('writer') }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Kontributor / Dosen Pembimbing </span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="contributor" value="{{ old('contributor') }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Penerbit</span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="publisher" value="{{ old('publisher') }}" />
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Jenis Koleksi <span class="text-red-600">*</span></span>
                        </label>
                        <select class="select select-bordered" name="collection_type">
                            <option value="bahan ajar" @if (old('collection_type') == 'bahan ajar') selected @endif>Bahan Ajar
                            </option>
                            <option value="tugas akhir" @if (old('collection_type') == 'tugas akhir') selected @endif>Tugas Akhir
                            </option>
                            <option value="jurnal" @if (old('collection_type') == 'jurnal') selected @endif>Jurnal</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Abstrak</span>
                        </label>
                        <textarea class="textarea textarea-bordered h-24" placeholder="Abstrak" name="abstract">{{ old('abstract') }}</textarea>
                    </div>
                    <label class="label">
                        <span class="label-text">List File</span>
                    </label>

                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Upload File <span class="text-red-600">*</span></span>
                        </label>
                        <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="file[]"
                            multiple />
                    </div>
                    <div class="form-control w-full mt-3">
                        <button type="submit"
                            class="btn bg-green-500 hover:bg-green-700 border-none lg:w-fit w-full">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>Submission Page</title>
</head>

<body class="bg-slate-50">
    @include('partials.landing_navbar')
    <section class="lg:w-[50%] w-[90%] rounded-lg bg-white mx-auto mt-8 lg:p-8 p-2">
        @if ($settings->allow_to_submit == 1)
            <h1 class="text-center text-2xl font-bold text-green-500">SUBMISSION</h1>
            <h1 class="text-center text-sm text-slate-600">Masukkan informasi file yang akan disubmit</h1>
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
            <form action="" method="POST" class="mt-3" enctype="multipart/form-data" autocomplete="off">
                @csrf
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
                        <option value="bahan ajar" @if (old('collection_type') == 'bahan ajar') selected @endif>Bahan Ajar</option>
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
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Upload File <span class="text-red-600">*</span></span>
                    </label>
                    <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="file[]"
                        multiple />
                </div>
                <div class="form-control w-full mt-3">
                    <button type="submit" class="btn bg-green-500 hover:bg-green-700 border-none">SUBMIT</button>
                    <h1 class="text-xs text-slate-600 text-center mt-2">Bagian yang mempunyai <span
                            class="text-red-600">*</span> wajib diisi</h1>
                    <h1 class="text-xs text-slate-600 text-center mt-2">Setelah disubmit
                        file akan divalidasi oleh Admin
                        terlebih
                        dahulu</h1>
                </div>
            </form>
        @else
            <div class="text-red-500 text-center">
                <div class="mx-auto w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                    </svg>
                </div>
                <p>Submission ditutup, silahkan hubungi Administrator untuk lebih lanjut</p>
            </div>
        @endif
    </section>
    @include('partials.landing_footer')
</body>

</html>

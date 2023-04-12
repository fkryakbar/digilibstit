<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            <div class="rounded-lg mt-4 shadow-lg lg:p-5 p-3 lg:w-full">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li>Edit : {{ $collection->u_id }} </li>
                    </ul>
                </div>
                <h1 class="font-bold text-2xl text-green-500">
                    EDIT : {{ $collection->u_id }}
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
                <form action="" method="POST" class="mt-3" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Akses <span class="text-red-600">*</span></span>
                        </label>
                        <select class="select select-bordered" name="visibility">
                            <option value="pending" @if ($collection->visibility == 'pending') selected @endif>Pending
                            </option>
                            <option value="public" @if ($collection->visibility == 'public') selected @endif>Public
                            </option>
                            <option value="restricted" @if ($collection->visibility == 'restricted') selected @endif>Restricted
                            </option>
                        </select>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Judul <span class="text-red-600">*</span></span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="title" value="{{ $collection->title }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Penulis <span class="text-red-600">*</span></span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="writer" value="{{ $collection->writer }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Kontributor / Dosen Pembimbing </span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="contributor" value="{{ $collection->contributor }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Penerbit</span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="publisher" value="{{ $collection->publisher }}" />
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Jenis Koleksi <span class="text-red-600">*</span></span>
                        </label>
                        <select class="select select-bordered" name="collection_type">
                            <option value="bahan ajar" @if ($collection->collection_type == 'bahan ajar') selected @endif>Bahan Ajar
                            </option>
                            <option value="tugas akhir" @if ($collection->collection_type == 'tugas akhir') selected @endif>Tugas Akhir
                            </option>
                            <option value="jurnal" @if ($collection->collection_type == 'jurnal') selected @endif>Jurnal</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Abstrak</span>
                        </label>
                        <textarea class="textarea textarea-bordered h-24" placeholder="Abstrak" name="abstract">{{ $collection->abstract }}</textarea>
                    </div>
                    <label class="label">
                        <span class="label-text">List File</span>
                    </label>
                    <table class="w-full">
                        <tbody>
                            @forelse ($files as $file)
                                <tr>
                                    <td class="border-b-2 p-3">{{ $file->filename }}</td>
                                    <td class="border-b-2 p-3">
                                        <a target="_blank" href="/library/submission/{{ $file->u_id }}"
                                            class="btn btn-sm bg-blue-600 hover:bg-blue-900 border-none">
                                            Buka
                                        </a>
                                        <button type="button" onclick="delete_file('{{ $file->u_id }}')"
                                            class="btn btn-sm bg-red-600 hover:bg-red-900 border-none">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <label class="label">
                                    <span class="label-text text-red-500">File tidak ditemukan</span>
                                </label>
                            @endforelse
                        </tbody>
                    </table>
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

    <script>
        function delete_file(u_id) {
            Swal.fire({
                title: 'Yakin?',
                text: "File tidak akan dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/file/${u_id}/delete`;
                }
            })
        }
    </script>
</body>

</html>

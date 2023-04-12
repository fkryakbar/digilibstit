<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <script src=" https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Dashboard</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl text-green-500">
                        COLLECTION MANAGER
                    </h1>
                    <a href="/dashboard/add" class="btn bg-green-500 hover:bg-green-700 border-none hidden lg:flex">
                        <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        Tambah Koleksi
                    </a>
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
                <div class="overflow-x-auto">
                    <table class="table table-compact w-full" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Jenis Koleksi</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $i => $collection)
                                <tr>
                                    <th>{{ $i + 1 }}</th>
                                    <td class="max-w-sm">
                                        <p class="truncate">
                                            {{ $collection->title }}
                                        </p>
                                    </td>
                                    <td>{{ $collection->collection_type }}</td>
                                    <td>{{ $collection->created_at }}</td>
                                    <td>
                                        <a href="/dashboard/edit/{{ $collection->u_id }}"
                                            class="btn btn-sm bg-blue-600 hover:bg-blue-900 border-none">
                                            EDIT
                                        </a>
                                        <button onclick="delete_collection(`{{ $collection->u_id }}`)"
                                            class="btn btn-sm bg-red-600 hover:bg-red-900 border-none">
                                            HAPUS
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    <a href="/dashboard/add" class="btn bg-green-500 hover:bg-green-700 border-none  lg:hidden mt-5">
                        <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        Tambah Koleksi
                    </a>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        function delete_collection(u_id) {
            Swal.fire({
                title: 'Yakin?',
                text: "Koleksi tidak akan dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/submission/delete/${u_id}`;
                }
            })
        }
    </script>
</body>

</html>

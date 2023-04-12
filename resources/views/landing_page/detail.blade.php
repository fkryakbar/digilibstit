<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>{{ $data->title }} | Digilib STIT Assunniyyah</title>
</head>

<body class="bg-slate-50">
    @include('partials.landing_navbar')
    @include('partials.landing_hero')

    <section class="lg:w-[80%] w-[95%] mx-auto mt-10">
        <div class="lg:flex gap-3">
            <div class="basis-[70%] bg-white lg:p-5 p-3 rounded-lg ">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/" class="text-green-500">
                                Beranda</a></li>
                        <li class="w-[300px] overflow-hidden">Detail</li>
                    </ul>
                </div>
                <h1 class="text-green-500 text-2xl  uppercase font-bold">{{ $data->title }}</h1>
                <table class=" w-full mt-5 mb-5">
                    <tbody>
                        <tr>
                            <td class="border-b-2 border-slate-200 p-2">Penulis</td>
                            <td class="border-b-2 border-slate-200 p-2">: {{ $data->writer }}</td>
                        </tr>
                        @if ($data->contributor)
                            <tr>
                                <td class="border-b-2 border-slate-200 p-2">Kontributor / Dosen Pembimbing</td>
                                <td class="border-b-2 border-slate-200 p-2">: {{ $data->contributor }}</td>
                            </tr>
                        @endif
                        @if ($data->publisher)
                            <tr>
                                <td class="border-b-2 border-slate-200 p-2">Penerbit</td>
                                <td class="border-b-2 border-slate-200 p-2">: {{ $data->publisher }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="border-b-2 border-slate-200 p-2">Jenis Koleksi</td>
                            <td class="border-b-2 border-slate-200 p-2 uppercase">: {{ $data->collection_type }}</td>
                        </tr>
                        <tr>
                            <td class="border-b-2 border-slate-200 p-2">Akses</td>
                            <td class="border-b-2 border-slate-200 p-2 uppercase">:
                                @if ($data->visibility == 'public')
                                    <span class="text-sm py-2 px-4 rounded-lg bg-green-500 text-white font-bold">
                                        {{ $data->visibility }}
                                    </span>
                                @else
                                    <span class="text-sm py-2 px-4 rounded-lg bg-red-500 text-white font-bold">
                                        {{ $data->visibility }}
                                    </span>
                                @endif


                            </td>
                        </tr>
                        <tr>
                            <td class="border-b-2 border-slate-200 p-2">Tanggal Input</td>
                            <td class="border-b-2 border-slate-200 p-2">:
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h1 class="font-bold">Abstrak :</h1>
                <p class="text-justify indent-8">
                    @if ($data->abstract)
                        {{ $data->abstract }}
                    @else
                        -
                    @endif
                </p>
                <h1 class="mt-4 font-bold">Files : </h1>
                @forelse ($files as $file)
                    <p>
                        <a class="text-green-500"
                            href="/library/submission/{{ $file->u_id }}">{{ $file->filename }}</a>
                    </p>
                @empty
                    File Not Found
                @endforelse
            </div>
            <div class="basis-[30%] bg-white lg:p-5 p-5 rounded-lg lg:mt-0 mt-4 ">
                <div class="flex text-green-500 uppercase justify-between">
                    <h1 class="text-lg font-bold">Artikel lainnya</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-journal-bookmark" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z" />
                        <path
                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path
                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>
                </div>
                <ul class="list-outside list-disc p-2">
                    @foreach ($others as $other)
                        <li>
                            <a href="/detail/{{ $other->u_id }}" class="text-green-500 hover:font-bold uppercase">
                                {{ $other->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @include('partials.landing_footer')
</body>

</html>

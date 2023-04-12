<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>Digital Library STIT Assunniyyah Tambarangan</title>
</head>

<body class="bg-slate-50">
    @include('partials.landing_navbar')
    @include('partials.landing_hero')
    <section class="lg:w-[80%] w-[95%] mx-auto mt-10 ">
        <div class="flex justify-between">
            @if (Request::get('search') || Request::get('category'))
                <h1 class="text-green-500 text-3xl font-bold py-1 border-l-4 border-green-500 px-3">PENCARIAN</h1>
                <div class="text-2xl text-green-500 ">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>

                </div>
            @else
                <h1 class="text-green-500 text-3xl font-bold py-1 border-l-4 border-green-500 px-3">TERBARU</h1>
                <div class="text-2xl text-green-500 ">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                        <path
                            d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        <path
                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path
                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>
                </div>
            @endif

        </div>
        <hr class="mt-3">
        <div class="lg:flex mt-5 gap-3">
            <div class="lg:basis-4/5 bg-white rounded-lg p-3">
                @if (Request::get('search') || Request::get('category'))
                    <h1 class="text-green-500 ">Hasil Pencarian
                        : {{ $library->total() }}</h1>
                @endif
                @forelse ($library as $lib)
                    <div class="flex gap-2 my-3">
                        <div class="basis-[7%] flex justify-center">
                            <svg class="h-10 w-10 text-green-500" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                            </svg>
                        </div>
                        <div class="basis-[93%]">
                            <a href="/detail/{{ $lib->u_id }}">
                                <h1 class="uppercase text-green-500 font-bold lg:mb-1 mb-2 text-sm lg:text-base">
                                    {{ $lib->title }}
                                    <span
                                        class="uppercase font-bold rounded-lg p-[4px] m-2 bg-slate-500 text-xs text-white whitespace-nowrap">{{ $lib->collection_type }}</span>
                                </h1>
                                <div class="flex gap-2 text-sm text-slate-500 flex-wrap">
                                    <div class="flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                        {{ $lib->writer }}
                                    </div>
                                    <span>
                                        -
                                    </span>
                                    <div class="flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lib->created_at)->format('d-m-Y') }}
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>

                @empty
                    <h1 class="text-center">No data Available</h1>
                @endforelse
                @if ($library->hasPages())
                    <div class="bg-white p-4 flex items-center flex-wrap mx-auto justify-center text-xs">
                        <nav aria-label="Page navigation">
                            <ul class="inline-flex">
                                @if ($library->onFirstPage() == false)
                                    <li>
                                        <a
                                            href="{{ route('home', ['page' => $library->currentPage() - 1, 'search' => Request::get('search'), 'category' => Request::get('category')]) }}">
                                            <button
                                                class="h-10 px-5 text-green-600 transition-colors duration-150 rounded-l-lg focus:shadow-outline hover:bg-green-100">
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                    <path
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg></button>
                                        </a>
                                    </li>
                                @endif
                                @for ($i = 1; $i <= $library->lastPage(); $i++)
                                    <li>
                                        <a
                                            href="{{ route('home', ['page' => $i, 'search' => Request::get('search'), 'category' => Request::get('category')]) }}">
                                            <button
                                                class="h-10 px-5  transition-colors duration-150 focus:shadow-outline hover:bg-green-100 @if ($library->currentPage() == $i) bg-green-200  @else text-green-600 @endif">{{ $i }}</button>
                                        </a>
                                    </li>
                                @endfor
                                @if ($library->lastPage() != $library->currentPage())
                                    <li>
                                        <a
                                            href="{{ route('home', ['page' => $library->currentPage() + 1, 'search' => Request::get('search'), 'category' => Request::get('category')]) }}">
                                            <button
                                                class="h-10 px-5 text-green-600 transition-colors duration-150 bg-white rounded-r-lg focus:shadow-outline hover:bg-green-100">
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                    <path
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg></button>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>

                @endif
            </div>
            <div class="lg:basis-1/5 p-3 bg-white rounded-lg mt-3 lg:mt-0 h-fit">
                <div>
                    <div class="flex gap-2 justify-between my-3">
                        <h1 class="text-green-500 font-bold text-2xl ">KATEGORI</h1>

                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                            <path
                                d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
                        </svg>
                    </div>
                    <hr class="mb-3">
                    <div>
                        <h1>
                            <a href="?category=bahan ajar" class="text-green-500">Bahan Ajar </a>
                        </h1>
                        <h1>
                            <a href="?category=jurnal" class="text-green-500">Jurnal</a>
                        </h1>
                        <h1>
                            <a href="?category=tugas akhir" class="text-green-500">Tugas Akhir</a>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partials.landing_footer')


</body>

</html>

<section class="bg-green-700 mt-5">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <nav class="flex flex-wrap justify-center -mx-5 -my-2 items-center">
            <div class="px-5 py-2">
                <a href="http://stitastbr.ac.id" class="text-base leading-6 text-white hover:text-gray-900">
                    STIT Assunniyyah Tambarangan
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="?category=bahan ajar" class="text-base leading-6 text-white hover:text-gray-900">
                    Bahan Ajar
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="?category=jurnal" class="text-base leading-6 text-white hover:text-gray-900">
                    Jurnal
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="?category=tugas akhir" class="text-base leading-6 text-white hover:text-gray-900">
                    Tugas Akhir
                </a>
            </div>
            <div class="px-5 py-2">
                <div class="form-control">
                    <div class="input-group">
                        <form action="@if (Request::is('detail*') || Request::is('submission*')) / @endif" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                                    value="{{ Request::get('search') }}" />
                                <button type="submit"
                                    class="btn btn-square bg-green-800 border-none hover:bg-green-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <p class="mt-8 text-base leading-6 text-center text-white">
            © {{ date('Y') }} STIT Assunniyyah Tambarangan. All rights reserved.
        </p>
    </div>
</section>

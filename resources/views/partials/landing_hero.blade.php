<section
    class="bg-[url('/static/image/kampus.jpg')] h-[450px] lg:h-[450px] bg-center bg-no-repeat bg-cover bg-fixed relative">
    <div class="bg-green-600 h-[450px] lg:h-[450px] w-full opacity-70 absolute">
    </div>
    <div class="absolute w-full">
        <div class="mt-10 flex flex-col p-5 items-center">
            <img width="150px" src="{{ asset('static/image/logo-polos.png') }}" class="ml-auto mr-auto">
            <div class="lg:w-[70%] ml-auto mr-auto mt-4 text-center">
                <h1 class="text-3xl lg:text-5xl font-bold text-white">{{ $settings->title }}</h1>
            </div>

            <div class="flex justify-center flex-col lg:block mt-5">
                <div class="form-control">
                    <form action="@if (Request::is('detail*')) / @endif" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                                value="{{ Request::get('search') }}" />
                            <button type="submit" class="btn btn-square bg-green-800 border-none hover:bg-green-900">
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
    </div>
</section>

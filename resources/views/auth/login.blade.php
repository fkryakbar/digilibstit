<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>Login</title>
</head>

<body class="bg-slate-50">
    @include('partials.landing_navbar')
    <section class="h-screen flex justify-center items-center">
        <div class="w-[90%] lg:w-[50%] mx-auto bg-white rounded-lg mt-10 lg:p-5 p-3">
            <h1 class="font-bold text-green-500 text-center text-2xl">LOGIN PAGE</h1>
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
            <form action="" method="POST" autocomplete="off">
                @csrf
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" name="username" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Password" name="password" class="input input-bordered w-full" />
                </div>
                <button class="btn bg-green-500 hover:bg-green-700 border-0 mt-3 w-full lg:w-fit">Login</button>
            </form>
        </div>
    </section>
    @include('partials.landing_footer')
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>onetimething</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="min-h-[90vh]">
        <nav class="bg-fuchsia-200 text-lg flex justify-end p-4 sm:p-6 lg:px-8 gap-4 items-center">
            @auth
                <a href="{{ route('secrets.index') }}" class="hover:underline">Secrets</a>
                <a href="{{ route('secrets.index') }}" class="hover:underline">Log out</a>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Log in</a>
            @endauth
        </nav>
        <section class="h-[40vh] bg-fuchsia-200 flex flex-col items-center justify-center">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-row gap-2 items-center">
                    <h1 class="text-7xl font-bold tracking-tighter">onetimething</h1>
                    <x-application-logo class="h-16 mx-auto mt-2" />
                </div>
                <h2 class="text-xl tracking-tight">Keep it secret, keep it safe.</h2>
            </div>
            <div class="flex flex-col justify-center h-1/3">
                <a href="{{ route('register') }}"
                    class="border border-black p-4 text-lg rounded-full shadow shadow-gray-700 bg-white hover:bg-gray-100 active:shadow-inner active:shadow-gray-500">
                    Get started
                </a>
            </div>
        </section>
        <section
            class="px-4 pb-4 sm:px-6 sm:pb-6 lg:px-8 lg:pb-8 pt-16 mx-auto max-w-7xl grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="h-80 p-4 flex flex-col items-center justify-center">
                <span class="text-lg font-semibold">Keep secrets out of</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-32">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                </svg>
            </div>
            <div class="h-80 p-4 flex flex-col items-center justify-center">
                <span class="text-lg font-semibold">Keep secrets out of</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-32">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                </svg>
            </div>
            <div class="h-80 p-4 flex flex-col items-center justify-center">
                <span class="text-lg font-semibold">Keep secrets off</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-32">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </div>
        </section>
    </main>
    <footer class="bg-gray-700 min-h-[10vh]">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex flex-row justify-center items-center">
            <span class="text-sm text-gray-400">Made with ❤️ by <a href="https://github.com/custompro98"
                    target="_blank">custompro98</a></span>
        </div>
    </footer>
</body>

</html>

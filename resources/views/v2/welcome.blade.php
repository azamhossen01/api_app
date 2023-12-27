<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="relative isolate overflow-hidden bg-gray-900 py-16 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
            <form action="{{ route('v2.short_url') }}" method="post">
                @csrf 
                <div class="max-w-xl lg:max-w-lg">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Effortless URL Shortening: Transform Long Links into Concise and Shareable URLs</h2>
                    <p class="mt-4 text-lg leading-8 text-gray-300">Welcome to our URL Shortening Service! Experience the ease of managing your long URLs with our efficient tool. Simply enter your lengthy link into the input field below, hit the 'Shorten' button, and instantly obtain a concise, user-friendly link. Simplify your navigation and enhance link sharing effortlessly with our service</p>
                    <div class="mt-6 flex max-w-md gap-x-4">
                      <label for="short_url" class="sr-only">Short Url</label>
                      <input id="short_url" name="short_url" type="text" autocomplete="short_url" required class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Enter short url">
                      <button type="submit" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Visit</button>
                    </div>
                  </div>
            </form>
            <div class="gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
              <div class="flex flex-col items-start">
                <ul class="divide-y divide-gray-300">
                    @forelse ($collection as $key => $item)
                    <li class="flex justify-between items-center py-2">
                        <span class="text-blue-500">{{ $key + 1 . '. ' }}
                        <a target="_blank" href="{{ $item->long_url }}">{{  Str::limit($item->long_url, 50) }}</a> 
                        <span class="text-green-500">Views : {{ $item->view_count }}</span>
                        </span>
                    </li>
                    @empty
                        
                    @endforelse
                       
                   
                </ul>
              </div>
              
            </div>
          </div>
        </div>
        <div class="absolute left-1/2 top-0 -z-10 -translate-x-1/2 blur-3xl xl:-top-6" aria-hidden="true">
          <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
      </div>

</body>
</html>

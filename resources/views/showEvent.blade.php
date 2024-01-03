<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-200">
    <div class="py-10 px-4 lg:px-28">
        <h1 class="flex justify-center text-5xl mb-16">{{ $event->name}}</h1>
        <div class="lg:flex h-screen">
            <div class="lg:w-2/3 lg:h-1/3 flex flex-col items-center lg:items-start mb-6">
                <h1 class="text-3xl mb-2">{{ $event->name}}</h1>
                <h3 class="mb-6">{{ $event->price }} kr</h3>
                <h2 class="text-2xl mb-6">Description</h2>
                <p class="lg:w-2/3 mb-6">{{ $event->Description }}</p>
                <div class="border border-black rounded-3xl w-1/5 py-2 hover:bg-green-400">
                <a class="flex justify-center" href="{{ route('home') }}" >Back</a>
            </div>
            </div>
            <div class="lg:w-1/3 lg:h-3/5 bg-white rounded-3xl  flex flex-col justify-between shadow-md">
                <div class="pl-8 pt-6">
                <h1 class="text-2xl mb-6">Information</h1>
                <h2 class="text-xl">When</h2>
                <h3 class="mb-2">{{ $event->start_date }} - {{ $event->end_date }}</h3>
                <h2 class="text-xl">Teacher</h2>
                <h3 class="mb-2">Placeholder</h3>
                <h2 class="text-xl">Time</h2>
                <h3 class="mb-2">Placeholder</h3>
                <h2 class="text-xl">Location</h2>
                <h3 class="mb-12">{{ $event->location }}</h3>
            </div>
            <form action="{{ route('events.register', ['id' => $event->id]) }}" method="POST" class="flex flex-col px-8 pb-6">
                @csrf
            <div>
                <button type="submit" class="border rounded-3xl w-full py-2 bg-green-400">Register</button>
            </div>
        </form>
        @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif
        @if(session('error'))
                    <div class="bg-red-200 text-green-800 p-4 rounded">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    
</body>
</html>
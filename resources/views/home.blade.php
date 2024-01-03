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
    <div class="py-10">
        <form action="{{ route('logout') }}" method="POST" class="flex justify-end pr-16">
            @csrf
            <button type="submit" class="border border-black rounded-3xl px-3 p-1">Sign out</button>
        </form>
    <div class="flex justify-center text-3xl mb-24">
        <h1>Events</h1>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4 lg:px-24">
        @foreach ($events as $event)
            <div class="border rounded-2xl p-4  bg-white shadow-md">
                <div class="text-sm text-gray-500 mb-2 flex justify-between">
                 <p>{{ $event->price}} kr</p>
                 <p>{{ $event->location }}</p>
               <p >{{ $event->start_date }}</p>
            </div>
                <h1 class="text-3xl flex justify-center mb-6">{{ $event->name }}</h1>
                <div class="flex justify-between gap-12 mb-6">
                
                </div> 
                <a href="{{ route('events.show', ['id' => $event->id]) }}" class="border rounded-3xl flex justify-center w-1/2 m-auto p-2 px-4 bg-gray-400 hover:bg-green-500">Read more</a>

            </div>
        @endforeach
    </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <div>
        <ul class="flex justify-center gap-8 text-2xl pt-10">
            <li>
                <a class="hover:text-green-500" href="{{ route('home') }}">Courses</a>
            </li>
            <li>
                <a class="hover:text-green-500" href="{{ route('events.registered', ['user_id' => Auth::id()]) }}">Registered courses</a>
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" class="flex justify-end pr-16">
            @csrf
            <button type="submit" class="border border-black rounded-3xl px-3 p-1 hover:bg-red-400">Sign out</button>
        </form>
    </div>
    <h1 class="flex justify-center text-3xl pt-10">Registered courses</h1>

    <div class="flex justify-center mt-20">
        @if($registeredEvents->count() > 0)
    <ul class="grid grid-cols-3 gap-10 ">
        
        @foreach($registeredEvents as $event)
        <div class="mb-4 border rounded-2xl p-8  bg-white shadow-md">
            <li class="mb-8">{{ $event->name }} - {{ $event->start_date }}</li>
            <form action="{{ route('events.unregister', ['event' => $event->id]) }}" method="post" onclick="return confirm('Are you sure you want to unregister from this event?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="border border-black rounded-2xl p-2 w-full hover:bg-red-400">Unregister</button>
            </form>
        </div>
            
        @endforeach
    </ul>

@else
    <p>No courses registered yet.</p>
@endif

    </div>
<div class="flex justify-center">
    @if(session('success'))
    <div class="text-green-500">
        {{ session('success') }}
    </div>
 </div>
@endif
</body>
</html>
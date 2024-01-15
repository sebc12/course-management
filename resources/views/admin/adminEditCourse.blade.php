<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="flex justify-center text-3xl pt-10">Edit Course</h1>
    <form action="{{ route('events.update', ['id' => $event->id]) }}" method="post" class="flex flex-col px-6 lg:w-1/3 m-auto mt-14 gap-1 pb-6">
        @csrf
        @method('PUT')
        <label for="">Coruse Name</label>
        <input type="text" name="name" value="{{ $event->name }}" class="border border-black">
        <label for="">Start Date</label>
        <input type="date" name="start_date" value="{{ $event->start_date }}" class="border border-black">
        <label for="">End Date</label>
        <input type="date" name="end_date" value="{{ $event->end_date}}" class="border border-black">
        <label for="">Location</label>
        <input type="text" name="location" value="{{ $event->location}}" class="border border-black">
        <label for="">Capacity</label>
        <input type="number" name="capacity" value="{{ $event->capacity }}" class="border border-black">
        <label for="">Price</label>
        <input type="numebr" name="price" value="{{ $event->price }}" class="border border-black">
        <label for="">Description</label>
        <textarea name="Description" cols="50" rows="5" class="border border-black mb-4 p-1">{{ $event->Description }}</textarea>
        <button type="submit" class="border border-black w-1/2 m-auto rounded-2xl">Save</button>
        <div>
            @if(session('success'))
                <div class="text-green-500">{{ session('success') }}</div>
            @endif
        
            @if(session('error'))
                <div class="text-red-500">{{ session('error') }}</div>
            @endif
        </div>
    </form>
</body>
</html>
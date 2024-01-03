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
    <div class="lg:flex w-screen h-screen">
       
        <div class="lg:w-1/5 bg-gray-500 lg:pt-10 py-4 flex flex-col items-center justify-center text-2xl lg:h-full lg:fixed lg:top-0 lg:left-0 lg:static overflow-auto">
            <ul>
                <li class="mb-10">
                    <a href="#" onclick="showPage('newCourse')">New Course</a>
                </li>
                <li>
                    <a href="#" onclick="showPage('participants')">Participants</a>
                </li>
            </ul>
        </div>
        <div class="lg:w-4/5 pt-10 m-auto pl-60 pb-10">
            <form action="{{ route('logout') }}" method="POST" class="flex justify-end pr-16">
                @csrf
                <button type="submit" class="border border-black rounded-3xl px-3 p-1">Sign out</button>
            </form>
            <h1 class="flex justify-center text-4xl">Dashboard</h1>
            <div id="newCoursePage">
                <form action="{{ route('events.store') }}" method="post" class="flex flex-col px-6 lg:w-1/3 m-auto mt-14 gap-1 pb-6">
                    @csrf
                    <label for="">Coruse Name</label>
                    <input type="text" name="name" class="border border-black">
                    <label for="">Start Date</label>
                    <input type="date" name="start_date" class="border border-black">
                    <label for="">End Date</label>
                    <input type="date" name="end_date" class="border border-black">
                    <label for="">Location</label>
                    <input type="text" name="location" class="border border-black">
                    <label for="">Capacity</label>
                    <input type="number" name="capacity" class="border border-black">
                    <label for="">Price</label>
                    <input type="numebr" name="price" class="border border-black">
                    <label for="">Description</label>
                    <textarea name="Description" id="" cols="50" rows="3" class="border border-black mb-4"></textarea>
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
            </div>
            <div id="participantsPage" style="display: none;">
                <!-- Content for the participants page -->
                <h2 class="flex justify-center text-2xl my-10">Events and Participants</h2>
                <ul class="grid grid-cols-1 lg:grid-cols-3 gap-4 px-6">
                    @foreach($events as $event)
                        <div class="border p-4 flex flex-col">
                            <strong>{{ $event->name }}</strong> - Participants: {{ $event->registrations_count }}
                            <button  onclick="showParticipants({{ $event->id }})" class="border rounded-2xl w-1/2 my-4">Show Participants</button>
                            <div id="participants_{{ $event->id }}" class="hidden">
                                <!-- Content for displaying participants for this event -->
                                @foreach($event->registrations as $registration)
                                    {{ $registration->user->name }} -
                                    {{ $registration->user->email }}<br>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <script>
        function showPage(pageName) {
            // Hide all pages
            document.getElementById('newCoursePage').style.display = 'none';
            document.getElementById('participantsPage').style.display = 'none';

            // Show the selected page
            document.getElementById(pageName + 'Page').style.display = 'block';
        }

    function showParticipants(eventId) {
        // Hide all participant sections
        document.querySelectorAll('[id^="participants_"]').forEach(function (element) {
            element.style.display = 'none';
        });

        // Show participants for the selected event
        document.getElementById('participants_' + eventId).style.display = 'block';
    }
</script>
</body>
</html>
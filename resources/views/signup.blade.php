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

<div class="">
    <h1 class="text-5xl flex justify-center pt-10 mb-24">Signup</h1>
    <form method="POST" action="{{ route('signup') }}" class="flex flex-col items-center">
        @csrf
        <div class="mb-4">
            <label for="name" >Name</label>
            <div class="col-md-6">
                <input id="name" type="text" name="name" class="border border-black rounded p-1"  required >
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <label for="email" >Email</label>
            <div>
                <input id="email" type="email" name="email" class="border border-black rounded p-1" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="my-4">
            <label for="password">Password</label>
            <div class="col-md-6">
                <input id="password" type="password" name="password" class="border border-black rounded p-1" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="mb-4">
            <label for="password-confirm">Confirm password</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" name="password_confirmation" class="border border-black rounded p-1" required>
            </div>
        </div>            
            <div>
                <button type="submit" class="border border-black rounded-3xl w-full px-6 p-1">Submit</button>
            </div>
    </form>
</div>

</body>
</html>
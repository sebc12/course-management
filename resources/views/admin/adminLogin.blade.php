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
<div class="w-screen">
    <h1 class="text-5xl flex justify-center pt-10 mb-24">Admin sign in</h1>
    <form method="POST" action="{{ route('admin.login') }}" class="flex flex-col items-center">
        @csrf
        <div >
            <label for="email" >Email</label>
            <div>
                <input id="email" type="email" name="email" class="border border-black rounded p-1 mb-6 @error('email') is-invalid @enderror" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <label for="password">Password</label>
            <div>
                <input id="password" type="password" name="password" class="border border-black rounded p-1 mb-6 @error('password') is-invalid @enderror"  required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="border border-black rounded-3xl px-6 p-1">
                   login
                </button>
            </div>
    </form>
</div>
</body>
</html>
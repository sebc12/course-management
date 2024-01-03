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
    
    
        <h1 class="text-5xl flex justify-center pt-10 mb-24">Sign in</h1>
        <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center">
            @csrf
            <div>
                <label for="email">E-mail Adress</label>
                <div class="mb-4">
                    <input id="email" type="email" class="border border-black rounded p-1" name="email" required>
                    
                </div>

                <label for="password">Password</label>
                <div>
                    <input id="password" type="password" class="border border-black rounded p-1 mb-6 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="flex justify-center mb-8">
                <button type="submit" class="border border-black rounded-3xl px-7 p-1">
                   Login
                </button>
            </div>
        </form>
        <div class="flex justify-center">
            <a href="{{ route('signup') }}" >
                <button class="border border-black rounded-3xl px-6 p-1">Signup</button>
            </a>
        </div>
</body>
</html>
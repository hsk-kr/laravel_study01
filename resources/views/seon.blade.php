<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <div>
        @auth
        <a href="{{ url('/home') }}">Home</a>
        
        @else
        <a href="{{ route('login') }}">Login</a>
        @endauth
        aasdsda
    </div>
    
</head>
<body>
    
</body>
</html>
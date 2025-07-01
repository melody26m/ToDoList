<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Elevation</title>
    
    @vite('resources/js/app.js')
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: #f4f4f9;
            color: #333;
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color:rgb(94, 52, 77);
        }

        a.button {
            display: inline-block;
            padding: 12px 24px;
            background-color:black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a.button:hover {
            background-color: antiqueblue;
        }
    </style>
</head>
<body>
    <h1>Welcome to Weekly Workflow</h1>
    <h2>Your journey to a more productive week starts here</h2>
    <a href="{{ route('login') }}" class="button">Log In</a>
    <p>New to Task Elevation? <a href="{{ route('register') }}">Create an account</a></p>
</body>
</html>

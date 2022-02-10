<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/1f0095e90c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
    <title>Larapex  + Livewire Ejemplo</title>
</head>
<body class="bg-gray-900 h-100 w-100">
    <header class="h-16 bg-black w-100">

    </header>
    <div class="container border-2 rounded-lg mx-auto my-24 min-vw-100 h-4/5 p-4 ">
        <div class="">
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>
</html>

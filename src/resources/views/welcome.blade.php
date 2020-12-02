<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="antialiased">
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-4 text-center">
                    <h1>Паттерны проектирования</h1>
                    <hr>
                </div>
            </div>
        </div>
        @include('includes.patterns')
    </div>
</main>
</body>
</html>
